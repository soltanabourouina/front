<?php

namespace App\Http\Controllers;

use App\PlanPayeRow;
use Illuminate\Http\Request;
use App\Exceptions\NoFileFoundException;
use App\Exceptions\NotOneSheetException;
use App\CodeRegroupementPrincipal;
use App\CodeRegroupementSecondaire;
use App\SpreadsheetColumnStructure;
use App\Exceptions\UnknownFileTypeException;
use App\CorrespondanceLigneBudgetaire;
use App\FileVariant;

class CorrespondanceLigneBudgetaireController extends Controller
{
    public function codesBudgetairesFileUploadGET()
    {
        $file_variants = FileVariant::where('type', 3)->get();
        return view('CorrespondanceLigneBudgetaire.fileUpload', compact("file_variants"));
    }

    public function codesBudgetairesDefinePOST(Request $request)
    {
        try {
            $variant = $request->input('variant');
            // Upload the file and insert the data into the DB
            $fileModel = FileUploadController::uploadFile($request);
            // Get the lines from the first and only sheet in the file
            $lines = SpreadsheetController::getLines($fileModel);
            // Get the index of the header row if found
            $headerRowIndex = SpreadsheetController::getRowHeaderIndex($lines, 3);
            // Empty the DB table
            PlanPayeRow::where("variant", $variant)->delete();
            // PlanPayeRow::truncate();
            // Get the structure definitions
            $structures = SpreadsheetColumnStructure::where('type', 3)->get();
            // Process the file
            foreach ($lines as $row => $line) {
                if ($row <= $headerRowIndex) {
                    continue;
                }
                $planPayeRow = new PlanPayeRow();
                foreach ($structures as $structure) {
                    $planPayeRow->{$structure->colonne_bdd} = $line[$structure->colonne_client];
                }
                $planPayeRow->variant = $variant;
                $planPayeRow->save();
            }
        } catch (NoFileFoundException $e) {
            return redirect()->back()->withErrors('Aucun fichier détecté');
        } catch (NotOneSheetException $e) {
            return redirect()->back()->withErrors('Faut télécharger un fichier avec exactement une feuille');
        } catch (UnknownFileTypeException $e) {
            return redirect()->back()->withErrors('Type de fichier non reconnu');
        }

        $codes_principales = CodeRegroupementPrincipal::all();
        $codes_secondaires = CodeRegroupementSecondaire::all();
        $planPaye = PlanPayeRow::all();

        return view('CorrespondanceLigneBudgetaire.form', compact('codes_principales', 'codes_secondaires', 'planPaye', 'variant'));
    }

    public function saveCodesBudgetairesPOST(Request $request)
    {
        CorrespondanceLigneBudgetaire::truncate();
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^(secondaire_)(\d+)$/', $key) && $value != 0) {
                $planPayeRow = PlanPayeRow::find(str_replace('secondaire_', '', $key) + 1);
                $code_secondaire = CodeRegroupementSecondaire::find($value);
                CorrespondanceLigneBudgetaire::create([
                    'code_regroupement_secondaire' => $code_secondaire->abreviation,
                    'code_client' => $planPayeRow->code_rubrique,
                    'code_client_verbose' => $planPayeRow->intitule_rubrique,
                    'variant' => $request->input("variant"),
                ]);
            }
        }
        return redirect()->route('budgetCodesGET')->withSuccess('Lignes budgétaires enregistrées avec succès.');
    }

    public function budgetCodesGET()
    {
        $correspondances = CorrespondanceLigneBudgetaire::all();

        if ($correspondances->isEmpty()) {
            return redirect()->route('codesBudgetairesFileUploadGET');
        }

        $correspondances = $correspondances->map(function ($correspondance, $key) {
            return collect([
                "code_client" => $correspondance->code_client,
                "code_client_verbose" => $correspondance->code_client_verbose,
                "abrv_cp_bdd" => $correspondance->codeSecondaire()->codePrincipal()->abreviation,
                "label_cp_bdd" => $correspondance->codeSecondaire()->codePrincipal()->name,
                "abrv_cs_bdd" => $correspondance->codeSecondaire()->abreviation,
                "label_cs_bdd" => $correspondance->codeSecondaire()->libelle_secondaire,
            ]);
        });

        return view('CorrespondanceLigneBudgetaire.review', compact('correspondances'));
    }
}

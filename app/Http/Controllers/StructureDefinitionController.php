<?php

namespace App\Http\Controllers;

use App\File;
use App\FileVariant;
use App\TableColumn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Exceptions\NoFileFoundException;
use App\Exceptions\NotOneSheetException;
use App\SpreadsheetColumnStructure;
use App\Exceptions\UnknownFileTypeException;

class StructureDefinitionController extends Controller
{

    private static $LIMIT = 5;

    public function reviewGET()
    {
        $columns = SpreadsheetColumnStructure::all();
        if ($columns->isEmpty()) {
            return redirect()->route('uploadSpreadsheetColumnStructureGET');
        }
        $columns = $columns->map(function ($column, $key) {
            switch ($column->type) {
                case 1:
                    $type = "Fichier de personnel";
                    break;
                case 2:
                    $type = "Fichier de paie";
                    break;
                case 3:
                    $type = "Fichier de plan de paie";
                    break;
                default:
                    $type = $column->type;
                    break;
            }
            $column->type_verbose = $type;
            $column->colonne_bdd_verbose = $column->verboseName();
            return $column;
        });
        return view('StructureDefinition.review', compact('columns'));
    }

    public function uploadSpreadsheetColumnStructureGET()
    {
        $file_variants_grouped_by_type = FileVariant::all()->sortBy("type")->groupBy("type");
        return view('StructureDefinition.fileUpload', compact("file_variants_grouped_by_type"));
    }

    public function uploadSpreadsheetColumnStructurePOST(Request $request)
    {
        try {
            // Upload the file and insert the data into the DB
            $fileModel = FileUploadController::uploadFile($request);
            // Get the lines from the first and only sheet in the file
            $lines = SpreadsheetController::getLines($fileModel);
            // Delete the file
            $fileModel->delete();
            // Get the index of the header row if found
            $headerRowIndex = SpreadsheetController::getRowHeaderIndex($lines);
            // Splice the lines to get rid of anything over the header row
            $lines = SpreadsheetController::cutFirstLines($lines, $headerRowIndex);
            // Limit the number of lines
            $lines = SpreadsheetController::limitLines($lines, self::$LIMIT);
            // Append Column Index to the first row cells
            $lines = SpreadsheetController::appendIndicesToFirstRow($lines);
            // Get file type and variant
            $type = $request->input('type');
            $variant = $request->input('variant');
            if ($variant == "0") {
                $file_variant = new FileVariant();
                $file_variant->code = $request->input("code");
                $file_variant->label = $request->input("label");
                $file_variant->type = $request->input("type");
                $file_variant->save();
                $variant = $file_variant->code;
            }
            // Get the column per type
            $columns = TableColumn::columnsByType($type);

        } catch (NoFileFoundException $e) {
            return redirect()->back()->withErrors('Aucun fichier détecté');
        } catch (NotOneSheetException $e) {
            return redirect()->back()->withErrors('Faut télécharger un fichier avec exactement une feuille');
        } catch (UnknownFileTypeException $e) {
            return redirect()->back()->withErrors('Type de fichier non reconnu');
        }

        return view('StructureDefinition.structureDefinition', compact('columns', 'lines', 'type', 'variant'));
    }

    public function saveSpreadsheetColumnStructureDefinitionPOST(Request $request)
    {
        try {
            // Get file type and variant
            $type = $request->input('type');
            $variant = $request->input('variant');
            // Get the column per type
            $columns = TableColumn::columnsByType($type);

            SpreadsheetColumnStructure::where('file_variant_code', $variant)->delete();
    
            foreach ($columns as $column) {
                if ($column->name_bdd == "undefined") {
                    continue;
                }
                for ($i = 0; $i < $request->colCount; $i++) {
                    if ($request->input($i) == $column->name_bdd) {
                        SpreadsheetColumnStructure::create([
                            'type' => $type,
                            'file_variant_code' => $variant,
                            'colonne_bdd' => $column->name_bdd,
                            'colonne_client' => $i,
                            'colonne_client_verbose' => $request->input('verbose_' . $i),
                        ]);
                        break;
                    }
                }
            }

        } catch (UnknownFileTypeException $e) {
            return redirect()->back()->withErrors('Type de fichier non reconnu');
        }

        return redirect()->route('spreadsheetColumnStructureReviewGET')->withSuccess("Structure de fichier enregistrée avec succès.");
    }
}

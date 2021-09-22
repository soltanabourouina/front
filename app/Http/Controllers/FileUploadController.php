<?php

namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use App\File;
use App\FileVariant;
use App\Transaction;
use Illuminate\Http\Request;
use App\PayrollFileRow;
use App\PersonnelFileRow;
use App\Exceptions\InvalidYearException;
use App\Exceptions\NoFileFoundException;
use App\Exceptions\NotOneSheetException;
use App\Exceptions\InvalidMonthException;
use App\SpreadsheetColumnStructure;
use App\Http\Controllers\PayrollController;
use App\Exceptions\UnknownFileTypeException;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpreadsheetController;

class FileUploadController extends Controller
{
    public function uploadFilesGET()
    {
        $codes = SpreadsheetColumnStructure::all()->pluck("file_variant_code")->unique()->values();
        $file_variants_grouped_by_type = FileVariant::whereIn("code", $codes)->get()->sortBy("type")->groupBy("type");
        if ($file_variants_grouped_by_type->isEmpty()) {
            return redirect()->route("uploadSpreadsheetColumnStructureGET")->withWarning("Vous devez d'abord définir une structure de variante de fichier.");
        }
        return view('fileUploadForm', compact("file_variants_grouped_by_type"));
    }

    public function uploadFilesPOST(Request $request)
    {
        try {
            // Upload the file and insert the data into the DB
            $fileModel = FileUploadController::uploadFile($request);
            // Get the lines from the first and only sheet in the file
            $lines = SpreadsheetController::getLines($fileModel);
            // Get the index of the header row if found
            $headerRowIndex = SpreadsheetController::getRowHeaderIndex($lines);
            // Get request attributes
            $fileType = $request->input('type');
            $variant = $request->input('variant');
            $year = $request->input('year');
            $month = $request->input('month');
            // Creating the transaction that this file will beget
            $transaction = Transaction::create([
                'fileName' => $fileModel->name,
                'type' => $fileType,
                'file_variant_code' => $variant,
            ]);
            // Check if the input year and month are valid
            FileUploadController::checkValidYearAndMonth($year, $month, $fileType, $transaction);
            // Get the structure definitions
            $structures = SpreadsheetColumnStructure::where('file_variant_code', $variant)->get();
            // Process the file according to the type
            FileUploadController::processFile($lines, $headerRowIndex, $fileType, $year, $month, $transaction, $structures);

        } catch (NoFileFoundException $e) {
            return redirect()->back()->withErrors('Aucun fichier détecté');
        } catch (NotOneSheetException $e) {
            return redirect()->back()->withErrors('Faut télécharger un fichier avec exactement une feuille');
        } catch (UnknownFileTypeException $e) {
            return redirect()->back()->withErrors('Type de fichier non reconnu');
        } catch (InvalidYearException $e) {
            return redirect()->back()->withErrors('Année invalide');
        } catch (InvalidMonthException $e) {
            return redirect()->back()->withErrors('Mois invalide');
        }

        return redirect()->route('home')->withSuccess("Données enregistrées avec succès.");
  
    }

    public static function uploadFile(Request $request, $input = 'file')
    {
        $fileModel = new File();

        if ($request->file($input)) {
            $file = $request->file($input);
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
        } else {
            throw new NoFileFoundException();
        }

        return $fileModel;
    }

    public static function getLatestMonth($choice = 1)
    {
        $yearAndMonth = [
            'year' => 0,
            'month' => 0,
        ];
        switch ($choice) {
            case 1:
                $rows = PersonnelFileRow::all();
                break;
            case 2:
                $rows = PayrollFileRow::all();
                break;
            default:
                throw new UnknownFileTypeException();
                break;
        }
        foreach ($rows as $row) {
            if ($row->year > $yearAndMonth['year']) {
                $yearAndMonth['year'] = $row->year;
                $yearAndMonth['month'] = $row->month;
            } else if ($row->year == $yearAndMonth['year'] && $row->month > $yearAndMonth['month']) {
                $yearAndMonth['month'] = $row->month;
            }
        }
        return $yearAndMonth;
    }

    public static function checkValidYearAndMonth($year, $month, $fileType, $transaction)
    {   
        $latestYearAndMonth = FileUploadController::getLatestMonth($fileType);
        if ($year < $latestYearAndMonth['year']) {
            $transaction->delete();
            throw new InvalidYearException();
        } else if ($year == $latestYearAndMonth['year'] && $month <= $latestYearAndMonth['month']) {
            $transaction->delete();
            throw new InvalidMonthException();
        }
    }

    public static function processFile($lines, $headerRowIndex, $fileType, $year, $month, $transaction, $structures)
    {
        switch ($fileType) {
            case 1:
                FileUploadController::processPersonnelFile($lines, $headerRowIndex, $year, $month, $transaction, $structures);
                break;
            case 2:
                FileUploadController::processPayrollFile($lines, $headerRowIndex, $year, $month, $transaction, $structures);
                break;
            default:
                throw new UnknownFileTypeException();
                break;
        }
    }

    public static function processPersonnelFile($lines, $headerRowIndex, $year, $month, $transaction, $structures)
    {
        $people = collect([]);
        foreach ($lines as $row => $line) {
            if ($row <= $headerRowIndex) {
                continue;
            }

            $person = new PersonnelFileRow();
            $person->year = $year;
            $person->month = $month;

            // Fill the other attributes
            foreach ($structures as $structure) {
                switch ($structure->colonne_bdd) {
                    case 'sexe':
                        switch ($line[$structure->colonne_client]) {
                            case 'M':
                                $sexe = 1;
                                break;
                            case 'F':
                                $sexe = 2;
                                break;
                            default:
                                $sexe = 0;
                                break;
                        }
                        $person->{$structure->colonne_bdd} = $sexe;
                        break;
                    case 'date_de_naissance':
                    case 'date_anciennete':
                    case 'date_de_sortie':
                        $person->{$structure->colonne_bdd} = Carbon::parse($line[$structure->colonne_client]);
                        break;
                    case 'salaire_annuel_de_base':
                    case 'salaire_contractuel_prorate':
                    case 'salaire_contractuel_etp':
                    case 'salaire_contractuel_annuel_etp':
                        $numberAsString = $line[$structure->colonne_client];
                        $numberAsString = str_replace(",", "", $numberAsString);
                        $person->{$structure->colonne_bdd} = 100 * $numberAsString;
                        break;
                    default:
                        $person->{$structure->colonne_bdd} = $line[$structure->colonne_client];
                        break;
                }
            }

            $person->transaction_id = $transaction->id;
            $people->add($person);
        }

        // Save to the DB
        $people->each(function ($item, $key) {
            $item->save();
        });

        // Process the employees
        EmployeeController::saveEmployees($people);
    }

    public static function processPayrollFile($lines, $headerRowIndex, $year, $month, $transaction, $structures)
    {
        $payrollLines = collect([]);
        foreach ($lines as $row => $line) {
            if ($row <= $headerRowIndex) {
                continue;
            }

            $payrollLine = new PayrollFileRow();
            $payrollLine->year = $year;
            $payrollLine->month = $month;
            foreach ($structures as $structure) {
                switch ($structure->colonne_bdd) {
                    case 'montantSalarial':
                        $cell_value = $line[$structure->colonne_client];
                        if (is_string($cell_value) && str_contains($cell_value, "€")) {
                            $currencies = ["€", "$"];
                            $cell_value = trim(str_replace($currencies, "", trim($cell_value)));
                            $chars_to_remove = [" ", ","];
                            $cell_value = str_replace($chars_to_remove, "", $cell_value);
                        }
                        $numberAsString = $cell_value;
                      //  dd($numberAsString);
                        try{
                            $payrollLine->{$structure->colonne_bdd} = $numberAsString;
                        } catch (Exception $e) {
                            dd($numberAsString);
                        }
                        // $payrollLine->{$structure->colonne_bdd} = 100 * $numberAsString;
                        break;
                    default:
                        $payrollLine->{$structure->colonne_bdd} = $line[$structure->colonne_client];
                        break;
                }
            }
            $payrollLine->transaction_id = $transaction->id;
            $payrollLines->add($payrollLine);
        }

        // Save to the DB
        $payrollLines->each(function ($item, $key) {
            $item->save();
        });

        // Process the payroll lines
        PayrollController::savePayrollRows($payrollLines, $structures->first()->file_variant_code);
    }
}


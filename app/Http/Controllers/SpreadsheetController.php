<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Exceptions\ManySheetsException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Exceptions\NotOneSheetException;
use App\Exceptions\UnknownFileTypeException;

class SpreadsheetController extends Controller
{
    public static function getLines(File $fileModel)
    {
        $inputFileName = '.' . $fileModel->file_path;
        $spreadsheet = IOFactory::load($inputFileName);

        $sheetCount = $spreadsheet->getSheetCount();
        if ($sheetCount != 1) {
            throw new NotOneSheetException();
        }

        $lines = $spreadsheet->getSheet(0)->toArray();
        $lines = collect($lines);

        return $lines;
    }

    public static function getRowHeaderIndex($lines, $type = 1)
    {
        switch ($type) {
            case 1:
            case 2:
                $potentialIds = ["matricule", "mat", "identificateur", "id"];
                break;
            case 3:
                $potentialIds = ["code rubrique", "code_rubrique"];
                break;
            default:
                throw new UnknownFileTypeException();
                break;
        }
        $headerRowIndex = 0;
        $headerRowFound = false;
        foreach ($lines as $row => $line) {
            if ($headerRowFound == true) {
                break;
            }
            foreach ($line as $column => $cell) {
                if ($headerRowFound == true) {
                    break;
                }
                if (in_array(strtolower($cell), $potentialIds)) {
                    $headerRowIndex = $row;
                    $headerRowFound = true;
                }
            }
        }
        return $headerRowIndex;
    }

    public static function cutFirstLines($lines, $cutoffIndex)
    {
        if ($cutoffIndex > 0) {
            $lines = $lines->splice($cutoffIndex);
        }
        return $lines;
    }

    public static function limitLines($lines, $limit)
    {
        if ($limit > 0) {
            $lines = $lines->take($limit);
        }
        return $lines;
    }

    public static function appendIndicesToFirstRow($lines)
    {
        $first_line = $lines->first();
        foreach ($first_line as $column => $cell) {
            $first_line[$column] = "(" . self::getNameFromNumber($column) . ")";
            if (!self::isNullOrEmptyString($cell)) {
                $first_line[$column] = $cell . " " . $first_line[$column];
            }
        }
        $first_line = collect([$first_line]);
        $lines = self::cutFirstLines($lines, 1);
        $lines = $first_line->merge($lines);
        return $lines;
    }

    private static function isNullOrEmptyString($str)
    {
        return (!isset($str) || trim($str) === '');
    }

    public static function getNameFromNumber($num)
    {
        $numeric = $num % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval($num / 26);
        if ($num2 > 0) {
            return self::getNameFromNumber($num2 - 1) . $letter;
        } else {
            return $letter;
        }
    }
}

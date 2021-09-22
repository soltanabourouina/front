<?php

namespace App;

use App\Exceptions\UnknownFileTypeException;
use Illuminate\Database\Eloquent\Model;

class TableColumn extends Model
{
    protected $guarded = [];

    public static function columnsByType($type) {
        switch ($type) {
            case 1:
                $columns = self::personnelColumns();
                break;
            case 2:
                $columns = self::payrollColumns();
                break;
            case 3:
                $columns = self::planPayeColumns();
                break;
            default:
                throw new UnknownFileTypeException();
                break;
        }
        return $columns;
    }
    public static function personnelColumns() {
        return self::where('type', 1)->orWhere('type', 0)->get();
    }

    public static function payrollColumns() {
        return self::where('type', 2)->orWhere('type', 0)->get();
    }

    public static function planPayeColumns() {
        return self::where('type', 3)->orWhere('type', 0)->get();
    }
}

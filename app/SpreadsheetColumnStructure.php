<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpreadsheetColumnStructure extends Model
{
    protected $guarded = [];

    public static function personnelColumns()
    {
        return SpreadsheetColumnStructure::where('type', 1)->get();
    }

    public static function payrollColumns()
    {
        return SpreadsheetColumnStructure::where('type', 2)->get();
    }

    public static function planPayeColumns()
    {
        return SpreadsheetColumnStructure::where('type', 3)->get();
    }

    public function verboseName()
    {
        return TableColumn::where([
            'type' => $this->type,
            'name_bdd' => $this->colonne_bdd,
        ])->first()->name_verbose;
    }
}

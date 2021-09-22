<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetPayrollRow extends Model
{
    protected $guarded = [];

    public static function getAmount($year, $month, $employee_ref, $code_regroupement_secondaire)
    {
        return BudgetPayrollRow::where(compact("year", "month", "employee_ref", "code_regroupement_secondaire"))->first()->amount;
    }
}

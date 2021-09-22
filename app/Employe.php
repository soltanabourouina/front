<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employe extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public static function findByRef($ref)
    {
        return Employe::where('ref', $ref)->first();
    }

    public function contract()
    {
        return Contract::where('employee_ref', $this->ref)->latest()->first();
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPayrollTotal($year, $month)
    {
        return PayrollRow::getTotal($year, $month, $this);
    }
}

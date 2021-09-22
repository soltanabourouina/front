<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimulationPayrollRow extends Model
{
    protected $guarded = [];

    public static function getTotal(Simulation $simulation, $year, $month, Employe $employee = null)
    {
        if ($employee == null) {
            $payroll_rows = SimulationPayrollRow::where([
                'simulation_code' => $simulation->code,
                'year' => $year,
                'month' => $month,
                'code_regroupement_secondaire' => "ZGC",
            ])->get();
        } else {
            $payroll_rows = SimulationPayrollRow::where([
                'simulation_code' => $simulation->code,
                'year' => $year,
                'month' => $month,
                'code_regroupement_secondaire' => "ZGC",
                'employee_ref' => $employee->ref,
            ])->get();
        }
        return $payroll_rows->sum('amount');
    }
}

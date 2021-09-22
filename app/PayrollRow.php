<?php

namespace App;

use App\Http\Controllers\FileUploadController;
use Illuminate\Database\Eloquent\Model;

class PayrollRow extends Model
{
    protected $guarded = [];

    public static function ytdOrYtg($month)
    {
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        $latest_month = $latest_year_and_month['month'];
        if ($month > $latest_month) {
            return "YTG";
        } else {
            return "YTD";
        }
    }

    public static function getTotalBrut($year, $month, Employe $employee = null)
    {
        $secondaires_brut = CodeRegroupementPrincipal::findByAbreviation("B")->codesSecondaires()->pluck("abreviation")->toArray();

        if ($employee == null) {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
            ])->whereIn("code_regroupement_secondaire", $secondaires_brut)->get();
        } else {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
                'employee_ref' => $employee->ref,
            ])->whereIn("code_regroupement_secondaire", $secondaires_brut)->get();
        }

        return $payroll_rows->sum('amount');
    }

    public static function getTotalChargesPatronales($year, $month, Employe $employee = null)
    {
        $secondaires_charges = CodeRegroupementPrincipal::findByAbreviation("C")->codesSecondaires()->pluck("abreviation")->toArray();

        if ($employee == null) {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
            ])->whereIn("code_regroupement_secondaire", $secondaires_charges)->get();
        } else {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
                'employee_ref' => $employee->ref,
            ])->whereIn("code_regroupement_secondaire", $secondaires_charges)->get();
        }

        return $payroll_rows->sum('amount');
    }

    public static function getTotal($year, $month, Employe $employee = null)
    {
        if ($employee == null) {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
                'code_regroupement_secondaire' => "ZGC",
            ])->get();
        } else {
            $payroll_rows = PayrollRow::where([
                'year' => $year,
                'month' => $month,
                'code_regroupement_secondaire' => "ZGC",
                'employee_ref' => $employee->ref,
            ])->get();
        }
        return $payroll_rows->sum('amount');
    }

    public static function getCumulativeTotal($year, $month, Employe $employee = null)
    {
        $amount = 0;
        for ($current_month=1; $current_month <= $month ; $current_month++) {
            if ($employee == null) {
                $amount += PayrollRow::where([
                    'year' => $year,
                    'month' => $current_month,
                ])->get()->sum('amount');
            } else {
                $amount += PayrollRow::where([
                    'year' => $year,
                    'month' => $current_month,
                    'employee_ref' => $employee->ref,
                ])->get()->sum('amount');
            }
        }
        return $amount;
    }
}

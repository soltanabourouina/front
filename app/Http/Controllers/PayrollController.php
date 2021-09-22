<?php

namespace App\Http\Controllers;

use App\CorrespondanceLigneBudgetaire;
use App\Event;
use App\Employe;
use App\PayrollRow;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public static function savePayrollRows($payrollLines, $variant)
    {
        foreach ($payrollLines as $payrollLine) {
            self::savePayrollRow($payrollLine, $variant);
        }
    }

    public static function savePayrollRow($payrollLine, $variant)
    {
        $employee = Employe::findByRef($payrollLine->matricule);
        if (is_null($employee)) return;
        $code_secondaire = CorrespondanceLigneBudgetaire::codeSecondaireFromCodeClient($payrollLine->codeRubrique, $variant);
        if ($code_secondaire == null) return;

        $payrollRow = PayrollRow::where([
            'year' => $payrollLine->year,
            'month' => $payrollLine->month,
            'employee_ref' => $employee->ref,
            'code_regroupement_secondaire' => $code_secondaire->abreviation,
        ])->first();
        
       
        if ($payrollRow == null) {
            if ($payrollLine->montantSalarial=='-') {
                $payrollLine->montantSalarial = 0;
            }
            $payrollRow = PayrollRow::create([
               

                'year' => $payrollLine->year,
                'month' => $payrollLine->month,
                'employee_ref' => $employee->ref,
                'code_regroupement_secondaire' => $code_secondaire->abreviation,
                'amount' => $payrollLine->montantSalarial,
            ]);
            Event::create([
                'transaction_id' => $payrollLine->transaction_id,
                'year' => $payrollRow->year,
                'month' => $payrollRow->month,
                'action' => 'PAYROLL_ROW_CREATE',
                'ref' => $employee->ref,
                'data' => json_encode([
                    'payroll_row_id' => $payrollRow->id,
                    'code_regroupement_secondaire' => $code_secondaire->abreviation,
                    'amount' => $payrollRow->amount,
                ]),
            ]);
        
            
        } else {
            $new_amount = $payrollRow->amount + $payrollLine->montantSalarial;
            
            Event::create([
                'transaction_id' => $payrollLine->transaction_id,
                'year' => $payrollRow->year,
                'month' => $payrollRow->month,
                'action' => 'PAYROLL_ROW_AMOUNT_UPDATE',
                'ref' => $employee->ref,
                'old' => $payrollRow->amount,
                'new' => $new_amount,
                'data' => json_encode([
                    'payroll_row_id' => $payrollRow->id,
                    'code_regroupement_secondaire' => $code_secondaire->abreviation,
                ]),
            ]);

            $payrollRow->amount = $new_amount;
            $payrollRow->save();
        }
    }
}

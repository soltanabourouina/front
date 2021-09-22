<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FileUploadController;
class Simulation extends Model
{
    protected $guarded = [];

    public function payroll_rows()
    {
        return SimulationPayrollRow::where([
            "simulation_code" => $this->code,
        ])->get();
    }

    public function freshSimulationPayrollRows()
    {
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        $latest_year = $latest_year_and_month['year'];
        $latest_month = $latest_year_and_month['month'];
        $latest_payroll_rows = PayrollRow::where([
            'year' => $latest_year,
            'month' => $latest_month,
        ])->get();
        SimulationPayrollRow::where([
            'simulation_code' => $this->code,
        ])->delete();
        $events = SimulationEvent::where([
            'simulation_code' => $this->code,
        ])->orderBy("year", "asc")->orderBy("month", "asc")->orderBy("id", "asc")->get();
        
        $general_raise_events = collect();
        foreach ($events as $event) {
            switch ($event->action) {
                case 'GENERAL_RAISE':
                    $general_raise_events->add($event);
                    break;
                default:
                    # throw exception later
                    break;
            }
        }

        $employees = Employe::all();

        for ($month=1; $month <= 12; $month++) {
            if ($month > $latest_month) {
                $applied_general_raise_events = collect();
                foreach ($general_raise_events as $general_raise_event) {
                    if ($month < $general_raise_event->month) {
                        continue;
                    }
                    $applied_general_raise_events->push($general_raise_event);
                }
                foreach ($employees as $employee) {
                    // Brut
                    $salary = $employee->contract()->salaire_contractuel_prorate;
                    foreach ($applied_general_raise_events as $applied_general_raise_event) {
                        $event_data = json_decode($applied_general_raise_event->data);
                        
                        if (!$event_data->{$employee->contract()->csp}) { // If the employee's csp is not selected, pass
                            continue;
                        }
                        if ($event_data->coef != null && $event_data->operator == "GENERAL_RAISE_POPULATION_COEF_OPERATOR_HT" && $employee->contract()->coef < $event_data->coef) {
                            continue;
                        }
                        if ($event_data->coef != null && $event_data->operator == "GENERAL_RAISE_POPULATION_COEF_OPERATOR_LT" && $employee->contract()->coef > $event_data->coef) {
                            continue;
                        }

                        $percentage = $event_data->percentage;
                        $min = $event_data->min * 100;
                        $max = $event_data->max * 100;
                        
                        $added_amount = $salary * $percentage / 100;
                        if ($event_data->min != null && $added_amount < $min) {
                            $added_amount = $min;
                        }
                        if ($event_data->max != null && $added_amount > $max) {
                            $added_amount = $max;
                        }
                        $salary = $salary + $added_amount;
                    }
                    SimulationPayrollRow::create([
                        'simulation_code' => $this->code,
                        'year' => $latest_year,
                        'month' => $month,
                        'employee_ref' => $employee->ref,
                        'code_regroupement_secondaire' => "B01",
                        'amount' => $salary,
                    ]);
                    // Charges
                    $rate = TauxDeCharge::where("year", "<=", $latest_year)
                                        ->where("month", "<=", $month)
                                        ->where("csp", $employee->contract()->csp)
                                        ->orderBy('year', 'desc')
                                        ->orderBy('month', 'desc')
                                        ->firstOrFail()
                                        ->taux;
                    $charges = $salary * $rate;
                    SimulationPayrollRow::create([
                        'simulation_code' => $this->code,
                        'year' => $latest_year,
                        'month' => $month,
                        'employee_ref' => $employee->ref,
                        'code_regroupement_secondaire' => "C99",
                        'amount' => $charges,
                    ]);
                    // Total
                    $total = $salary + $charges;
                    SimulationPayrollRow::create([
                        'simulation_code' => $this->code,
                        'year' => $latest_year,
                        'month' => $month,
                        'employee_ref' => $employee->ref,
                        'code_regroupement_secondaire' => "ZGC",
                        'amount' => $total,
                    ]);
                }

                // foreach ($latest_payroll_rows as $row) {
                //     $amount = $row->amount;
                //     if ($row->code_regroupement_secondaire == "B01") {
                //         foreach ($general_raise_events as $general_raise_event) {
                //             if ($month < $general_raise_event->month) {
                //                 continue;
                //             }
                //             $event_data = json_decode($general_raise_event->data);

                //             $A = $event_data->A;
                //             $B = $event_data->B;
                //             $C = $event_data->C;
                //             $D = $event_data->D;
                //             $E = $event_data->E;
                //             $N = $event_data->N;
                //             $O = $event_data->O;
                //             $P = $event_data->P;
                //             $S = $event_data->S;
                //             $T = $event_data->T;


                //             $percentage = $event_data->percentage;
                //             $min = $event_data->min * 100;
                //             $max = $event_data->max * 100;


                //             $added_amount = $amount * $percentage / 100;
                //             if ($added_amount < $min) {
                //                 $added_amount = $min;
                //             }
                //             if ($added_amount > $max) {
                //                 $added_amount = $max;
                //             }
                //             $amount = $amount + $added_amount;
                //         }
                //     }
                //     SimulationPayrollRow::create([
                //         'simulation_code' => $this->code,
                //         'year' => $latest_year,
                //         'month' => $month,
                //         'employee_ref' => $row->employee_ref,
                //         'code_regroupement_secondaire' => $row->code_regroupement_secondaire,
                //         'amount' => $amount,
                //     ]);
                // }
            }
        }
    }

    public function getPayrollRows()
    {
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        $latest_year = $latest_year_and_month['year'];
        $latest_month = $latest_year_and_month['month'];
        $payrollsByMonth = collect();
        for ($month=1; $month <= 12; $month++) { 
            if ($month <= $latest_month) {
                $rows = PayrollRow::where([
                    'year' => $latest_year,
                    'month' => $month,
                ])->get();
            } else {
                $rows = SimulationPayrollRow::where([
                    'simulation_code' => $this->code,
                    'year' => $latest_year,
                    'month' => $month,
                ])->get();
            }
            $added_item = collect([
                'month' => $month,
                'rows' => $rows,
            ]);
            $payrollsByMonth->push($added_item);
        }
        return $payrollsByMonth;
    }

    public function getPayrollRowsNonGrouped()
    {
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        $latest_year = $latest_year_and_month['year'];
        $latest_month = $latest_year_and_month['month'];
        $payrolls = collect();
        for ($month=1; $month <= 12; $month++) { 
            if ($month <= $latest_month) {
                $rows = PayrollRow::where([
                    'year' => $latest_year,
                    'month' => $month,
                ])->get();
            } else {
                $rows = SimulationPayrollRow::where([
                    'simulation_code' => $this->code,
                    'year' => $latest_year,
                    'month' => $month,
                ])->get();
            }
            $payrolls = $payrolls->concat($rows);
        }
        return $payrolls;
    }

    public function getValueForMonth($month)
    {
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        $latest_year = $latest_year_and_month['year'];
        $latest_month = $latest_year_and_month['month'];
        if ($month <= $latest_month) {
            $total = PayrollRow::getTotal($latest_year, $month);
        } else {
            $total = SimulationPayrollRow::getTotal($this, $latest_year, $month);
        }
        return $total;
    }

    public function getTotalOfYear()
    {
        $total = 0;
        $latest_year_and_month = FileUploadController::getLatestMonth(2);
        for ($current_month=1; $current_month <= 12 ; $current_month++) {
            if ($current_month <= $latest_year_and_month['month']) {
                $total += PayrollRow::getTotal($latest_year_and_month['year'], $current_month);
            } else {
                $total += SimulationPayrollRow::getTotal($this, $latest_year_and_month['year'], $current_month);
            }
        }
        return $total;
    }
}

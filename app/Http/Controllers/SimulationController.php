<?php

namespace App\Http\Controllers;

use App\BudgetPayrollRow;
use App\Employe;
use App\etablissements;
use App\Simulation;
use App\SimulationEvent;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function simulationsGET()
    {
        $simulations = Simulation::all();
        $budget = BudgetPayrollRow::all();
        
        if($budget->isEmpty()) {
            $budget = null;
        } else {
            $budget = $budget->sum('amount');
        }
        return view('Simulation.browse', compact('simulations', 'budget'));
    }

    public function createSimulationGET()
    {
        return view('Simulation.create');
    }

    public function createSimulationPOST(Request $request)
    {
        $code = $request->code;
        $description = $request->description;
        $simulation = Simulation::create([
            'code' => $code,
            'description' => $description,
        ]);
        $simulation->freshSimulationPayrollRows();
        return redirect()->route('simulationsGET')->withSuccess('Simulation créée avec succès.');
    }

    public function readSimulationGET($simulation_id)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        $payrolls = $simulation->getPayrollRowsNonGrouped();

        $years_and_months = collect();
        $returned_payrolls = collect();
        foreach ($payrolls as $payroll) {
            $employee = Employe::findByRef($payroll->employee_ref);
            $etab = etablissements::findByCode($employee->contract()->etab);
            $added_item = collect([
                    "etab" => $etab->libelle,
                    "year" => $payroll->year,
                    "month" => $payroll->month,
                    "employee_ref" => $payroll->employee_ref,
                    "employee_name" => $employee->full_name(),
                    "employee_csp" => $employee->contract()->csp_verbose(),
                    "employee_coef" => $employee->contract()->coef,
                    "code_regroupement_secondaire" => $payroll->code_regroupement_secondaire,
                    "amount" => $payroll->amount,
            ]);
            $returned_payrolls->add($added_item);
            if (!$years_and_months->contains([
                "year" => $payroll->year, 
                "month" => $payroll->month,
                ])) {
                $years_and_months->push([
                    "year" => $payroll->year, 
                    "month" => $payroll->month,
                    ]);
            }
        }
        $etabs = $returned_payrolls->pluck("etab")->unique()->values();
        $overview_payrolls = collect();
        foreach ($etabs as $etab) {
            $added_item = collect([
                "etab" => $etab,
            ]);
            foreach ($years_and_months as $year_and_month) {
                $year = $year_and_month["year"];
                $month = $year_and_month["month"];
                $selected = $returned_payrolls
                            ->where("etab", $etab)
                            ->where("code_regroupement_secondaire", "ZGC")
                            ->where("year", $year)
                            ->where("month", $month);
                $added_item = $added_item->put($year."-".$month, $selected->sum("amount"));
            }
            $selected = $returned_payrolls
                        ->where("etab", $etab)
                        ->where("code_regroupement_secondaire", "ZGC");
            $added_item = $added_item->put("Total", $selected->sum("amount"));
            $overview_payrolls->push($added_item);
        }
        $added_item = collect([
            "etab" => "Tous"
        ]);
        foreach ($years_and_months as $year_and_month) {
            $year = $year_and_month["year"];
            $month = $year_and_month["month"];
            $sum = $overview_payrolls->pluck("$year-$month")->sum();
            $added_item = $added_item->put($year."-".$month, $sum);
        }
        $sum = $overview_payrolls->pluck("Total")->sum();
        $added_item = $added_item->put("Total", $sum);
        $overview_payrolls->push($added_item);

        $budget = BudgetPayrollRow::all();
        if($budget->isEmpty()) {
            $budget = null;
        } else {
            $budget = $budget->sum('amount');
        }
        return view('Simulation.read', compact('simulation', 'overview_payrolls', 'returned_payrolls', 'budget', 'years_and_months'));
    }

    public function editSimulationGET($simulation_id)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        return view('Simulation.edit', compact('simulation'));
    }

    public function editSimulationPOST($simulation_id)
    {
        // Code
        return redirect()->route('simulationsGET')->withSuccess('Simulation créée avec succès.');
    }

    public function confirmSimulationGET($simulation_id)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        $payrollsByMonth = $simulation->getPayrollRows();
        BudgetPayrollRow::truncate();
        foreach ($payrollsByMonth as $item) {
            $rows = $item["rows"];
            foreach ($rows as $row) {
                BudgetPayrollRow::create([
                    "year" => $row->year,
                    "month" => $row->month,
                    "employee_ref" => $row->employee_ref,
                    "code_regroupement_secondaire" => $row->code_regroupement_secondaire,
                    "amount" => $row->amount,
                ]);
            }
        }
        return redirect()->route('simulationsGET')->withSuccess('Simulation confirmée avec succès.');
    }

    public function deleteSimulationGET($simulation_id)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        $simulation->delete();
        return redirect()->route('simulationsGET')->withSuccess('Simulation supprimée avec succès.');
    }

    public function createSimulationEventGET($simulation_id)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        
        return view("Simulation.Event.create", compact("simulation"));
    }

    public function createSimulationEventPOST($simulation_id, Request $request)
    {
        $simulation = Simulation::findOrFail($simulation_id);
        $simulation_code = $simulation->code;
        $year = $request->input("year");
        $month = $request->input("month");
        $description = $request->input("description");
        $action = $request->input("action");
        switch ($action) {
            case 'GENERAL_RAISE':
                $percentage = $request->input("GENERAL_RAISE_PERCENTAGE");
                $min = $request->input("GENERAL_RAISE_MINIMUM");
                $max = $request->input("GENERAL_RAISE_MAXIMUM");
                $A = $request->input("GENERAL_RAISE_POPULATION_CSP_A");
                $B = $request->input("GENERAL_RAISE_POPULATION_CSP_B");
                $C = $request->input("GENERAL_RAISE_POPULATION_CSP_C");
                $D = $request->input("GENERAL_RAISE_POPULATION_CSP_D");
                $E = $request->input("GENERAL_RAISE_POPULATION_CSP_E");
                $N = $request->input("GENERAL_RAISE_POPULATION_CSP_N");
                $O = $request->input("GENERAL_RAISE_POPULATION_CSP_O");
                $P = $request->input("GENERAL_RAISE_POPULATION_CSP_P");
                $S = $request->input("GENERAL_RAISE_POPULATION_CSP_S");
                $T = $request->input("GENERAL_RAISE_POPULATION_CSP_T");
                $coef = $request->input("GENERAL_RAISE_COEF");
                $operator = $request->input("GENERAL_RAISE_POPULATION_COEF_OPERATOR");
                $data = json_encode(compact("percentage", "min", "max", "A", "B", "C", "D", "E", "N", "O", "P", "S", "T", "operator", "coef"));
                break;
            
            default:
                $data = json_encode([]);
                break;
        }
        $event = SimulationEvent::create(compact("simulation_code", "year", "month", "description", "action", "data"));
        $simulation->freshSimulationPayrollRows();
        return redirect()->route('readSimulationGET', ["id" => $simulation_id])->withSuccess('Evenement créé avec succès.');
    }

    public function createGeneralRaiseEvent($request, $simulation)
    {
        # code...
    }
}

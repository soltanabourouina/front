<?php

namespace App\Http\Controllers;

use App\BudgetPayrollRow;
use App\categories_professionnel;
use App\CategorieSocioprofessionelle;
use App\CodeRegroupementSecondaire;
use App\departements;
use App\Employe;
use App\etablissements;
use App\PersonnelFileRow;
//use App\postedepense;
use App\scenario;
use DateTime;
use App\evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;
use PhpParser\Node\Stmt\If_;

class ScenariiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $coderegsegs=CodeRegroupementSecondaire::all();
        $csociopros=CategorieSocioprofessionelle::all();
        $catprofs=categories_professionnel::all();
        $events = evenement ::orderBy('id','DESC')->paginate(5);

        $services=PersonnelFileRow::orderBy('c_service', 'ASC') ->where('c_service', '<>', NULL) ->get('c_service'); 
        $scenarios = scenario::orderBy('id','DESC')->paginate(5);
       
 
        $yearInit=BudgetPayrollRow ::orderBy('year', 'ASC')->first('year'); 

        $monthInit=BudgetPayrollRow ::orderBy('month', 'ASC')
        ->where('code_regroupement_secondaire','ZGC')
        ->get('month'); 


           
        $budM1 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',1)->get();    
        $budM2 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',2)->get();    
        $budM3 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',3)->get();    
       $t1 =($budM1->Sum('amount') + $budM2->Sum('amount')+$budM3->Sum('amount'));

       
        $budM4 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',4)->get();    
        $budM5 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',5)->get();    
        $budM6 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',6)->get();    
        $t2 =($budM4->Sum('amount') + $budM5->Sum('amount')+$budM6->Sum('amount'));

        $budM7 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',7)->get();    
        $budM8 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',8)->get();    
        
        $budM9 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',9)->get();    
        $t3=($budM7->Sum('amount') + $budM8->Sum('amount')+$budM9->Sum('amount'));

        $budM10 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',10)->get();    
        $budM11 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',11)->get();    
        $budM12 = BudgetPayrollRow::Sum('amount')->where('code_regroupement_secondaire','ZGC')->where('month','=',12)->get();    
        $t4 =($budM10->Sum('amount') + $budM11->Sum('amount')+$budM12->Sum('amount'));


         //EFM: effectif de personnes présente en fin de mois
        //select MIN(year) from personnel_file_rows
       //$minyear= DB::select(DB::raw("select MIN(year) FROM personnel_file_rows"));
      //dd($minyear);
  
  
  

  $eff = DB::select(DB::raw("select  month, COUNT(*) 
  From personnel_file_rows
   WHERE (year=(select MIN(year) FROM personnel_file_rows LIMIT 1) and date_de_sortie IS NULL ) 
   GROUP BY month"));
 // $eff=BudgetPayrollRow :: count('employee_ref');    
//dd($eff);



        return view('scenarii.index', compact('scenarios','events','coderegsegs','csociopros','catprofs','services','budM1',
        'budM2','budM3','budM4','budM5','budM6','budM7','budM8','budM9','budM10','budM11','budM12',
        'yearInit','monthInit','t1','t2','t3','t4','eff'))
        ->with('i', ($request->input('page', 1) - 1) * 5);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        evenement::create($request->all());
     
        
        session()->flash('Add', 'Ajouté avec succés');
        return redirect('/scenarii');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
      
        $scenario = scenario::findOrFail($request->pro_id);
       
       
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function edit(scenario $scenario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


       $scenario = scenario::findOrFail($request->pro_id);
  
       session()->flash('Edit', 'modifié avec succés');
       return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\scenario  $scenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $scenario = scenario::findOrFail($request->pro_id);
         $scenario->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
    public function destroy_ev(Request $request)
    {
         $events = evenement::findOrFail($request->pro_id);
         $events->delete();
         session()->flash('delete', 'supprimé avec succés');
         return back();
    }
}




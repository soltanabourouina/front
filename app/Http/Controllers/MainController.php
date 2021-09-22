<?php

use App\Http\Controllers\Controller;

use App\Simulation;

class MainController extends Controller
{

    public function home()
    {
        return view('index');
    }

    public function testGET()
    {
        Simulation::find(1)->freshSimulationPayrollRows();
    }
}
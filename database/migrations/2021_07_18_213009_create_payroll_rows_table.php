<?php

use App\Employe;
use App\etablissements;
use App\Simulation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('payroll_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->string('etab');
            $table->foreign('etab', 'etablissements')->references('code')->on('etablissements')->onDelete('cascade')->onUpdate('cascade');
          
            $table->string('employee_ref');
            $table->foreign('employee_ref', 'payroll_row_employee')->references('ref')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code_regroupement_secondaire');
            $table->foreign('code_regroupement_secondaire', 'payroll_row_secondaire')->references('abreviation')->on('code_regroupement_secondaires')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_rows');
    }
}

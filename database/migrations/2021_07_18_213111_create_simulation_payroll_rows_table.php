<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationPayrollRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_payroll_rows', function (Blueprint $table) {
            $table->id();
            $table->string('simulation_code');
            $table->foreign('simulation_code', 'simulation_payroll_row_simulation_code')->references('code')->on('simulations')->onDelete('cascade');
            $table->integer('year');
            $table->integer('month');
            $table->string('employee_ref');
            $table->foreign('employee_ref', 'simulation_payroll_row_employee')->references('ref')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code_regroupement_secondaire');
            $table->foreign('code_regroupement_secondaire', 'simulation_payroll_row_secondaire')->references('abreviation')->on('code_regroupement_secondaires')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('simulation_payroll_rows');
    }
}

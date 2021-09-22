<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollFileRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_file_rows', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->string('matricule');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('codeRubrique');
            $table->string('montantSalarial');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id', 'ldpsage_transaction_id')->references('id')->on('transactions')->onDelete('cascade');
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
        Schema::dropIfExists('payroll_file_rows');
    }
}

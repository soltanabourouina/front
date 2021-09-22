<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTauxDeChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taux_de_charges', function (Blueprint $table) {
            $table->id();
            $table->integer("year");
            $table->integer("month");
            $table->string("csp");
            $table->foreign('csp', 'taux_charges_csp')->references('abreviation')->on('categorie_socioprofessionelles')->onDelete('cascade')->onUpdate('cascade');
            $table->double("taux");
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
        Schema::dropIfExists('taux_de_charges');
    }
}

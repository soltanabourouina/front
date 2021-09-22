<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrespondanceLigneBudgetairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correspondance_ligne_budgetaires', function (Blueprint $table) {
            $table->id();
            $table->string('code_regroupement_secondaire')->unique;
            $table->foreign('code_regroupement_secondaire', 'correspondance_secondaire')->references('abreviation')->on('code_regroupement_secondaires')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code_client');
            $table->string('code_client_verbose');
            $table->string('variant');
            $table->foreign('variant')->references('code')->on('file_variants')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('correspondance_ligne_budgetaires');
    }
}

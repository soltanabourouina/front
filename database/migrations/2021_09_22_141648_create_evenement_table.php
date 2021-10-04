<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement', function (Blueprint $table) {
            $table->id();
            $table->string('choixpop');
            $table->string('popul')->nullable();
            $table->string('matricule')->nullable();
            $table->string('service')->nullable();
            $table->float('montant');
            $table->integer('annee');
            $table->integer('mois');
            $table->integer('nbr_mois');
    
            $table->unsignedBigInteger('csp_id')->nullable();
            $table->foreign('csp_id')->references('id')->on('categorie_socioprofessionelles')->onDelete('cascade');
    
            $table->unsignedBigInteger('catpro_id')->nullable();
            $table->foreign('catpro_id')->references('id')->on('categories_professionnels')->onDelete('cascade');
    
            $table->unsignedBigInteger('codebud_id')->nullable();
            $table->foreign('codebud_id')->references('id')->on('code_regroupement_secondaires')->onDelete('cascade');
    
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
        Schema::dropIfExists('evenement');
    }
}







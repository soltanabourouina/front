<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeRegroupementSecondairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_regroupement_secondaires', function (Blueprint $table) {
            $table->id();
            $table->string('code_regroupement_principal');
            $table->foreign('code_regroupement_principal', 'secondaire_principal')->references('abreviation')->on('code_regroupement_principals')->onDelete('cascade')->onUpdate('cascade');
            $table->string('abreviation')->unique();
            $table->string('libelle_principale');
            $table->string('libelle_secondaire')->unique();
            $table->string('periodicite');
            $table->string('comment')->nullable();
            $table->boolean('application_taux_charge')->default(false);
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
        Schema::dropIfExists('code_regroupement_secondaires');
    }
}

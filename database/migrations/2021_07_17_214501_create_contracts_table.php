<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('employee_ref');
            $table->foreign('employee_ref', 'contract_employee')->references('ref')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('etab');
            $table->foreign('etab', 'contracts_etab')->references('code')->on('etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->date('signature_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('type');
            $table->foreign('type', 'contract_type')->references('abreviation')->on('contract_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('emploi_ref')->nullable();
            $table->foreign('emploi_ref', 'contract_emploi')->references('ref')->on('employes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('csp');
            $table->foreign('csp', 'contracts_csp')->references('abreviation')->on('categorie_socioprofessionelles')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('coef');
            $table->bigInteger('salaire_contractuel_prorate');
            $table->bigInteger('salaire_contractuel_etp')->nullable();
            $table->bigInteger('salaire_contractuel_annuel_etp')->nullable();
            $table->float('coef_horaire');
            $table->integer('nbr_mois_salaire_de_base');
            $table->bigInteger('salaire_annuel_de_base')->nullable();
            $table->string('mod_moi')->nullable();
            $table->integer('niv_job')->nullable();
            $table->string('poste_supp')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}

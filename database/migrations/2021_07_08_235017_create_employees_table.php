
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_de_naissance')->nullable();
            $table->date('date_anciennete')->nullable();
            $table->string('nature_contrat')->nullable();
            $table->string('type_contrat')->nullable();
            $table->string('v_niveau_classification')->nullable();
            $table->string('coef')->nullable();
            $table->string('salaire_contractuel_prorate')->nullable();
            $table->string('salaire_contractuel_etp')->nullable();
            $table->string('salaire_contractuel_annuel_etp')->nullable();
            $table->string('coef_horaire')->nullable();
            $table->string('nbr_mois_salaire_de_base')->nullable();
            $table->string('salaire_annuel_de_base')->nullable();
            $table->string('mod_moi')->nullable();
            $table->string('niv_job')->nullable();
          
            $table->string('status')->nullable();
            $table->string('c_actionnaire')->nullable();
            $table->string('c_co-actionnaire')->nullable();
            $table->string('c_groupe')->nullable();
            $table->string('c_branche')->nullable();
            $table->string('c_division')->nullable();
            $table->string('c_business_unit')->nullable();
            $table->string('c_activite')->nullable();
            $table->string('c_sous_activite')->nullable();
            $table->string('c_filiere_metier')->nullable();
            $table->string('c_sous_filiere_metier')->nullable();
           
            $table->string('c_zone')->nullable();
            $table->string('c_pays')->nullable();
            $table->string('c_societe_Entite_legale')->nullable();
            $table->string('c_region')->nullable();
            $table->string('c_departement')->nullable();
            $table->string('c_etab')->nullable();
            $table->string('c_direction')->nullable();
            $table->string('c_service')->nullable();
            $table->string('c_unite')->nullable();
            $table->string('c_atelier')->nullable();
            $table->string('pcs_ese')->nullable();
            $table->string('invalide')->nullable();
            $table->string('rqth')->nullable();
            $table->string('idcc');
            $table->float('temps_travail')->nullable();
            $table->string('reference_horaire')->nullable();
            $table->string('cat_pro')->nullable();
            $table->string('c_categorie_prof_resolue');
            $table->string('c_classification')->nullable();
            $table->string('c_metier_resolu')->nullable();
            $table->string('c_emploi')->nullable();
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
        Schema::dropIfExists('employees');
    }
}

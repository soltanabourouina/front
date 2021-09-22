<?php


use App\TableColumn;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }

    private static $undefinedColumn = [
        'undefined' => 'Non défini',
    ];

    private static $personnelColumns = [
        'matricule' => 'Matricule',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'sexe' => 'Sexe',
        'date_de_naissance' => 'Date de Naissance',
        'date_anciennete' => 'Date Anciennete',
        'date_de_sortie' =>'Date de sortie',
        'c_etab' => 'Code établissement',
      //  'l_etab' => 'Libellé établissement',
        'nature_contrat' => 'Nature de contrat',
		'type_contrat' => 'Type de contrat',
		'c_classification' => 'Code de classification',
		//'l_classification' => 'Libellé de classification',
		'v_niveau_classification' => 'Niveau de classification',
		'coef' => 'Coefficient',
        'coef_horaire' => 'Coefficient horaire',
		'nbr_mois_salaire_de_base' => 'Nombre de mois pour le salaire de base',
		'salaire_annuel_de_base' => 'Salaire annuel de base',
		'c_categorie_prof_resolue' => 'Code de catégorie socioprofessionelle',
		//'l_categorie_prof_resolue' => 'Libellé de catégorie socioprofessionelle',
		'c_metier_resolu' => 'Code de metier',
		//'l_metier_resolu' => 'Libellé de metier',
		'c_emploi' => 'Code d\'emploi',
		//'l_emploi' => 'Libellé d\'emploi',
     
		'salaire_contractuel_prorate' => 'Salaire contractuel proraté',
		'salaire_contractuel_etp' => 'Salaire contractuel ETP',
		'salaire_contractuel_annuel_etp' => 'Salaire contractuel annuel ETP',
		
		'mod_moi' => 'MOD / MOI',
		'niv_job' => 'Niveau job',
		'poste_supp' => 'Poste supprimé',
		'status' => 'Status', //id-poste- position management -si ouverete-> post a pourvoir-
//une genre de numéro de matricule indépendant du matricule , pour identifier le poste


         'c_actionnaire' =>'Code actionnaire',
         'c_co_actionnaire' =>'Code Co-actionnaire',
         'c_groupe' =>'Code groupe',
         'c_branche' =>'Code groupe',
         'c_division' =>'Code division',
         'c_business_unit' =>'Code business unit',
         'c_activite' =>'Code activié',
         'c_sous_activite' =>'Code sous activié',
         'c_filiere_metier' =>'Code filiere metier',
         'c_sous_filiere_metier' =>'Code sous filiere metier',
       
       
         'c_zone' =>'Code zone',
         'c_pays' =>'Code pays',
         'c_societe_entite_legale' =>'Code societe entite legale',
         'c_region' =>'Code region',
         'c_departement' =>'Code département',
         
         'c_direction' =>'Code direction',
         'c_service' =>'Code service',
         'c_unite' =>'Code unite',
         'c_atelier' =>'Code atelier',
         'pcs_ese' =>'PCS/ESE',
         'invalide' =>'Invalide',
         'rqth' =>'RQTH',
         'idcc' =>'IDCC',
         'temps_travail' =>'Temps de travail',
         'reference_horaire' =>'Référence horaire',
         'cat_pro' =>'Catégorie professionelle',
    ];

    private static $payrollColumns = [
        //code-etablissement
        'matricule' => 'Matricule',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'codeRubrique' => 'Code Rubrique',
        'montantSalarial' => 'Montant salarial',
    ];

    private static $planPayeColumns = [
        'code_rubrique' => 'Code rubrique',
        'intitule_rubrique' => 'Intitulé Rubrique',
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TableColumn::truncate();
        foreach (TableColumnSeeder::$undefinedColumn as $key => $value) {
            TableColumn::create([
                'type' => 0,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$personnelColumns as $key => $value) {
            TableColumn::create([
                'type' => 1,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$payrollColumns as $key => $value) {
            TableColumn::create([
                'type' => 2,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        foreach (TableColumnSeeder::$planPayeColumns as $key => $value) {
            TableColumn::create([
                'type' => 3,
                'name_bdd' => $key,
                'name_verbose' => $value,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

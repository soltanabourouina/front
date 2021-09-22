<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = [

        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_de_naissance',
        'date_anciennete',
        'nature_contrat',
        'type_contrat',
        'v_niveau_classification',
        'coef',
        'salaire_contractuel_prorate',
        'salaire_contractuel_etp',
        'salaire_contractuel_annuel_etp',
        'coef_horaire',
        'nbr_mois_salaire_de_base',
        'salaire_annuel_de_base',
        'mod_moi',
        'niv_job',
      
        'status',
        'c_actionnaire',
        'c_co_actionnaire',
        'c_groupe',
        'c_branche',
        'c_division',
        'c_business_unit',
        'c_activite',
        'c_sous_activite',
        'c_filiere_metier',
        'c_sous_filiere_metier',       
        'c_zone',
        'c_pays',
        'c_societe_Entite_legale',
        'c_region',
        'c_departement',
        'c_etab',
        'c_direction',
        'c_service',
        'c_unite',
        'c_atelier',
        'pcs_ese',
        'invalide',
        'rqth',
        'idcc',
        'temps_travail',
        'reference_horaire',
        'cat_pro',
        'c_categorie_prof_resolue',
        'c_classification',
        'c_metier_resolu',
        'c_emploi',
    ];
}

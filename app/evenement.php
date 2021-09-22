<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{

    protected $table = 'evenement';

    protected $fillable = [
        'choixpop',
        'matricule',
        'popul',
        'csp_id',
        'catpro_id',
        'service',
        'codebud_id',
        'montant',
        'annee',
        'mois',
        'nbr_mois',
       
    ];
  
   public function csp()
   {
   return $this->belongsTo('App\CategorieSocioprofessionelle');
   }
   public function codebud()
   {
   return $this->belongsTo('App\CodeRegroupementSecondaire');
   }
   public function categorie()
   {
   return $this->belongsTo('App\categories_professionnel');
   }
}

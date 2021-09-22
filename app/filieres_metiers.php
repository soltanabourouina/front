<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filieres_metiers extends Model
{
  
    protected $fillable = [
        'nom',
        'code',
        'categorie_id',
       
    ];

   public function categorie()
   {
   return $this->belongsTo('App\categories_professionnel');
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departements extends Model
{
  
    protected $fillable = [
        'nom',
        'region_id',
       
    ];

   public function region()
   {
   return $this->belongsTo('App\region');
   }
}

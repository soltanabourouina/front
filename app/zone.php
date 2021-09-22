<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    protected $fillable = [
    'code',
    'libelle',
];
//public function pays()
 //   {
 //       return $this->hasMany(Pays::class);
//    }
}

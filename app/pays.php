<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pays extends Model
{
    protected $fillable = [
        'code',
        'nom',
        'continent',
    ];
    //public function regions()
     //   {
     //       return $this->hasMany(Pays::class);
    //    }
}

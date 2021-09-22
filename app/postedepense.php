<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postedepense extends Model
{
    public $fillable = ['libelle','code'];

    public function scenarios(){
        return $this->belongsToMany(scenario::class);
    }
}

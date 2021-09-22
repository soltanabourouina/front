<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scenario extends Model
{
    protected $fillable = [
        'numscénario','total','isvalide'
       
    ];

    public function postedepenses(){
        return $this->belongsToMany(postedepense::class);
    }
}

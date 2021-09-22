<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organismes extends Model
{
   
    public $fillable = ['name','parent_id'];

    public function childs(){

        return $this->hasMany('App\Organismes', 'parent_id','id');

    }
}

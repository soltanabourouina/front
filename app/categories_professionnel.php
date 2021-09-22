<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories_professionnel extends Model
{
    protected $fillable = [
        'nom', 'code', 'Status',
        ];
}

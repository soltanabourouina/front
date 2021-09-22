<?php

namespace App;
use App\Motif;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nom_entreprise',
        'nom',
        'prenom',
        'titre',
        'tel',
        'email',
        'linkedin'
    ];
    public function motifs()
        {
            return $this->hasMany(Motif::class);
        }
}

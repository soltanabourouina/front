<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeRegroupementPrincipal extends Model
{
    public function codesSecondaires()
    {
        return CodeRegroupementSecondaire::where('code_regroupement_principal', $this->abreviation)->get();
    }

    public static function findByAbreviation($abreviation)
    {
        return Self::where("abreviation", $abreviation)->firstOrFail();
    }
}

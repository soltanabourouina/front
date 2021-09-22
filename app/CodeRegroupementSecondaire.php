<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeRegroupementSecondaire extends Model
{
    public function codePrincipal()
    {
        return CodeRegroupementPrincipal::where('abreviation', $this->code_regroupement_principal)->first();
    }

    public function codeClient()
    {
        $ligne_correspondance = CorrespondanceLigneBudgetaire::where('code_regroupement_secondaire', $this->abreviation)->first();
        if ($ligne_correspondance != null) {
            return $ligne_correspondance->code_client;
        }
        return null;
    }

    public static function findByAbreviation($abreviation)
    {
        return CodeRegroupementSecondaire::where("abreviation", $abreviation)->first();
    }
}

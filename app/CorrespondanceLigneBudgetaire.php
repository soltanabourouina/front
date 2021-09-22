<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrespondanceLigneBudgetaire extends Model
{
    protected $guarded = [];

    public function codeSecondaire()
    {
        return CodeRegroupementSecondaire::where('abreviation', $this->code_regroupement_secondaire)->first();
    }

    public static function codeSecondaireFromCodeClient($code_client, $variant)
    {
        $correspondance = CorrespondanceLigneBudgetaire::where('code_client', $code_client)->first();
        if ($correspondance != null) {
            return $correspondance->codeSecondaire();
        } else {
            return null;
        }
    }
}

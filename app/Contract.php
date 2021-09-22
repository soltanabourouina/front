<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];

    public static function findByEmployeeRef($ref)
    {
        return Contract::where('employee_ref', $ref)->first();
    }

    public function csp_verbose()
    {
        return CategorieSocioprofessionelle::where("abreviation", $this->csp)->firstOrFail()->libelle;
    }
}

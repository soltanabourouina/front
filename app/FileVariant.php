<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileVariant extends Model
{
 
    protected $guarded = [];

    public function typeVerbose()
    {        
        switch ($this->type) {
            case 1:
                $type = "Fichier de personnel";
                break;
            case 2:
                $type = "Fichier de paie";
                break;
            case 3:
                $type = "Fichier de plan de paie";
                break;
            default:
                $type = "Type de fichier non reconnu";
                break;
        }
        return $type;
    }
}

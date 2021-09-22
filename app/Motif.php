<?php

namespace App;
use App\Contact;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    protected $fillable = [
        'date',
        'content',
        'contacts_id'
    ];

       public function contact()
       {
           return $this->belongsTo(Contact::class, 'contacts_id', 'id');
       }

}

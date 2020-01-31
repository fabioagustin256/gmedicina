<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitoToxico extends Model
{
    protected $table = "habitos_toxicos";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}

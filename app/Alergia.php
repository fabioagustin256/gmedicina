<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecografia extends Model
{
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}

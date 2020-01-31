<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtroMetodo extends Model
{
    protected $table = "otros_metodos";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}

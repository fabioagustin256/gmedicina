<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = "medicamentos";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}

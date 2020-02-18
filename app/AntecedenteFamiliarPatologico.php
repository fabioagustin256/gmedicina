<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteFamiliarPatologico extends Model
{
    protected $table = "antecedentes_familiares_patologicos";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}

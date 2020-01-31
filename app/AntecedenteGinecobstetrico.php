<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteGinecobstetrico extends Model
{
    protected $table = "antecedentes_ginecobstetricos";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}
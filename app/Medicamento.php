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

    public function cargar_clase($claseid, $personaid, $descripcion)
    {
        try {
            $this->persona_id = $personaid;
            $this->descripcion = $descripcion;
            $this->save();
            return "Se agregó correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
    }
}

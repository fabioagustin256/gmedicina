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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Laboratorio extends Model
{   
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function mostrar_fecha()
    {
        $fecha = Carbon::createFromFormat('Y-m-d', $this->fecha)->format('d/m/Y');
        return $fecha;
    }
}

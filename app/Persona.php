<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function estado_civil()
    {
        return $this->belongsTo('App\EstadoCivil');
    }

    public function ocupacion()
    {
        return $this->belongsTo('App\Ocupacion');
    }

    public function obra_social()
    {
        return $this->belongsTo('App\ObraSocial');
    }
    
    public function mostrar()
    {
        return number_format($this->dni, 0, ',', '.') . " - " . $this->nombre . " " . $this->apellido;
    }

        
    // Campos de historia clínica

    public function antecedentes_ginecobstetricos()
    {
        return $this->hasMany('App\AntecedenteGinecobstetrico');
    }

    public function medicamentos()
    {
        return $this->hasMany('App\Medicamento');
    }
}

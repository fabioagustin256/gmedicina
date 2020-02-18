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

    public function antecedentes_quirurgicos()
    {
        return $this->hasMany('App\AntecedenteQuirurgico');
    }

    public function alergias()
    {
        return $this->hasMany('App\Alergia');
    }

    public function internaciones()
    {
        return $this->hasMany('App\Internacion');
    }

    public function habitos_toxicos()
    {
        return $this->hasMany('App\HabitoToxico');
    }

    public function medicamentos()
    {
        return $this->hasMany('App\Medicamento');
    }

    public function antecedentes_familiares_patologicos()
    {
        return $this->hasMany('App\AntecedenteFamiliarPatologico');
    }

    public function laboratorios()
    {
        return $this->hasMany('App\Laboratorio')->orderBy('fecha');
    }

    public function ecografias()
    {
        return $this->hasMany('App\Ecografia')->orderBy('fecha');
    }

    public function otros_metodos()
    {
        return $this->hasMany('App\OtroMetodo')->orderBy('fecha');
    }

    public function consultas()
    {
        return $this->hasMany('App\Consulta')->orderBy('fecha');
    }

    public function galeria_fotos()
    {
        return $this->hasMany('App\GaleriaFoto');
    }
}

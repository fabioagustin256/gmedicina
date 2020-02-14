<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriaFoto extends Model
{
    protected $table = 'galeria_fotos';

    protected $fillable = ['titulo', 'foto'];
}

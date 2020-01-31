<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internacion extends Model
{
    protected $table = "internaciones";
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}

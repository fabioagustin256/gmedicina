<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

function nombre_modelo($clasepersona)
{
    return 'App\\' . $clasepersona;
}

function obtener_objetos($clase, $persona)
{
    switch ($clase) 
    {
        case 'antecedenteginecobstetrico':
            $objetos = $persona->antecedentes_ginecobstetricos;
            break;
        case 'medicamento':
            $objetos = $persona->medicamentos;
            break;
    }
    return $objetos;
}


class HistoriaClinicaController extends Controller
{
    public function agregar($personaid, $clase, Request $request)
    {             
        $descripcion = $request->descripcion; 

        $modelo = nombre_modelo($clase);

        try {
            $objeto = new $modelo();
            $objeto->descripcion = $descripcion;
            $objeto->persona_id = $personaid;
            $objeto->save();            
            $correcto = true;
            $mensaje = "Se agregó correctamente";
        
        } catch (\Throwable $th) {
            //throw $th;
        }

        $persona = Persona::findorfail($personaid);

        $objetos = obtener_objetos($clase, $persona);
        $correcto = true;          
        return view('personas.detalles.historiaclinica.tabla1', compact('personaid', 'clase', 'objetos', 'correcto', 'mensaje'));
    }
}

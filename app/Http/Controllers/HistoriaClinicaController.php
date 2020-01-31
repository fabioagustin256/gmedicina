<?php

namespace App\Http\Controllers;

use App\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        case 'antecedentequirurgico':
            $objetos = $persona->antecedentes_quirurgicos;
            break;
        case 'alergia':
            $objetos = $persona->alergias;
            break;
        case 'internacion':
            $objetos = $persona->internaciones;
            break;
        case 'habitotoxico':
            $objetos = $persona->habitos_toxicos;
            break;
        case 'medicamento':
            $objetos = $persona->medicamentos;
            break;
        case 'laboratorio':
            $objetos = $persona->laboratorios;
            break;
    }
    return $objetos;
}

function cargar_campo($personaid, $clase, $request)
{    
    try {
        $modelo = nombre_modelo($clase);
        $objeto = new $modelo();

        if($request->fecha)
        {
            $objeto->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
        }
        
        if($request->descripcion)
        {
            $objeto->descripcion = $request->descripcion;
        }
        
        $objeto->persona_id = $personaid;
        $objeto->save();            
        $correcto = true;
        $mensaje = "Se agregó correctamente";
    
    } catch (\Throwable $th) {
        //throw $th;
    }
    return ['mensaje'=> $mensaje, 'correcto' => $correcto];
}


class HistoriaClinicaController extends Controller
{
    public function agregar($personaid, $clase, $tabla, Request $request)
    {   
        $resultado = cargar_campo($personaid, $clase, $request);
        $mensaje = $resultado['mensaje'];
        $correcto = $resultado['correcto'];       

        $persona = Persona::findorfail($personaid);

        $objetos = obtener_objetos($clase, $persona);
        $correcto = true;
        $ruta = 'personas.detalles.historiaclinica.' . $tabla;      
        return view($ruta, compact('personaid', 'clase', 'objetos', 'correcto', 'mensaje'));
    }

    public function quitar($personaid, $clase, $id, $tabla)
    {
        $modelo = nombre_modelo($clase);
        $objeto = $modelo::findorfail($id);
        try {
            $objeto->delete();
            $correcto = true;
            $mensaje = "El registro se eliminó correctamente";
        } catch (\Throwable $th) {
            $correcto = false;
            $mensaje = "No se puede eliminar el registro porque está asignado/a";
        }
        $persona = Persona::findorfail($personaid);
        $objetos = obtener_objetos($clase, $persona);
        $ruta = 'personas.detalles.historiaclinica.' . $tabla;  
        return view($ruta, compact('personaid', 'clase', 'clasepaciente', 'objetos', 'correcto', 'mensaje'));
    }
}
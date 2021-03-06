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
        case 'antecedentefamiliarpatologico':
            $objetos = $persona->antecedentes_familiares_patologicos;
            break;
        case 'laboratorio':
            $objetos = $persona->laboratorios;
            break;
        case 'ecografia':
            $objetos = $persona->ecografias;
            break;
        case 'otrometodo':
            $objetos = $persona->otros_metodos;
            break;
        case 'consulta':
            $objetos = $persona->consultas;
            break;
    }
    return $objetos;
}

function cargar_campo($personaid, $objeto, $request)
{    
    try {
  
        if($request->fecha)
        {
            $objeto->fecha = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
        }
        
        if($request->descripcion)
        {
            $objeto->descripcion = $request->descripcion;
        }

        if($request->tipo)
        {
            $objeto->tipo = $request->tipo;
        }

        if($request->ecografista)
        {
            $objeto->ecografista = $request->ecografista;
        }

        if($request->resumen)
        {
            $objeto->resumen = $request->resumen;
        }

        if($request->motivo)
        {
            $objeto->motivo = $request->motivo;
        }

        if($request->tratamiento)
        {
            $objeto->tratamiento = $request->tratamiento;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregar($personaid, $clase, $tabla, Request $request)
    {   
        $modelo = nombre_modelo($clase);
        if ($request->id)
        {
            $objeto = $modelo::findorfail($request->id);
        }
        else
        {            
            $objeto = new $modelo();
        }
        $resultado = cargar_campo($personaid, $objeto, $request);
        $mensaje = $resultado['mensaje'];
        $correcto = $resultado['correcto'];       

        $persona = Persona::findorfail($personaid);

        $objetos = obtener_objetos($clase, $persona);
        $correcto = true;
        $ruta = 'personas.detalles.historiaclinica.' . $tabla;      
        return view($ruta, compact('personaid', 'clase', 'objetos', 'correcto', 'mensaje'));
    }

    public function editar($personaid, $clase, $id, $formulario)
    {   
        $modelo = nombre_modelo($clase);
        $editar = $modelo::findorfail($id);

        $persona = Persona::findorfail($personaid);

        $ruta = 'personas.detalles.historiaclinica.'. $formulario;
        return view($ruta, compact('persona', 'editar', 'clase'));
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
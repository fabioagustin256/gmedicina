<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Imports\PersonasImport;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

use Maatwebsite\Excel\Facades\Excel;


function cargar_personas()
{
    return Persona::where('estado', true)->orderBy('apellido')->paginate(100);
}

function cargar_eliminados()
{
    return Persona::where('estado', false)->orderBy('apellido')->paginate(50);
}

function campos_requeridos($request){
    $request->validate([
        'dni' => 'required',
        'apellido' => 'required',
        'nombre' => 'required'
    ]);
}

function cargar_persona(Persona $persona, Request $request)
{
    try
    {
        $persona->dni = $request->dni;
        $persona->apellido = $request->apellido;
        $persona->nombre = $request->nombre;
        if ($request->fecha_nacimiento)
        {
            $persona->fecha_nacimiento = Carbon::createFromFormat('d/m/Y', $request->fecha_nacimiento)->format('Y-m-d');
        }
        else
        {
            $persona->fecha_nacimiento = null;
        }
        $persona->sexo = $request->sexo;
        $persona->estado_civil_id = $request->estado_civil;
        $persona->ocupacion_id = $request->ocupacion;
        $persona->obra_social_id = $request->obra_social;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->domicilio = $request->domicilio;
        $persona->save();
    } catch (Excepction $e) {
        return $e->getMessage();
    }    
}


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = cargar_personas();
        $opciones = true;
        return view('personas.listar', compact('personas', 'opciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        campos_requeridos($request);
        $persona = new Persona();
        cargar_persona($persona, $request);
        $mensaje = "Se agregó a " . $persona->mostrar();
        $correcto = true;    
        return view('personas.formulario', compact('mensaje', 'correcto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('personas.historiaclinica', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('personas.formulario', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        campos_requeridos($request);        
        $persona = Persona::findorfail($persona->id);
        cargar_persona($persona, $request);
        $mensaje = "Se actualizaron los datos de " . $persona->mostrar();
        $correcto = true;    
        return view('personas.formulario', compact('persona','mensaje', 'correcto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $correcto = true;
        try {
            $persona = Persona::findorfail($request->personaid);
            $persona->estado = false;
            $persona->save();
            $mensaje = 'Se eliminó a ' . $persona->mostrar();
        } catch (\Throwable $th) {
            $correcto = false;
        }
        $personas = cargar_personas();
        $opciones = true;
        return view('personas.listar', compact('personas', 'mensaje', 'correcto', 'opciones'));
    }

    public function filtrar(Request $request)
    {   
        $correcto = true;
        
        if($request->buscarid)
        {
            $personas = Persona::where('id', $request->buscarid);
        }

        if($request->mes_nacimiento &&  $request->mes_nacimiento != "Sin información" )
        {
            $personas = Persona::whereMonth('fecha_nacimiento', $request->mes_nacimiento);
        }

        if(isset($personas))
        {
            $personas = $personas->where('estado', true)->orderBy('apellido')->paginate(100);
            $mensaje = "Se aplicaron los filtros exitosamente";
        }
        else 
        {   
            $personas = cargar_personas();
            $correcto = false;
            if(!isset($mensaje))
            {
                $mensaje = "Debe elegir al menos un filtro";
            }
        }

        $opciones = true;
        return view('personas.listado.tabla', compact('personas', 'opciones', 'correcto', 'mensaje'));
    }

    public function resetearfiltrospersonas()
    {
        $personas = cargar_personas();
        $opciones = true;
        return view('personas.listado.tabla', compact('personas', 'opciones'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->get('term');
        $personas = Persona::where('nombre', 'LIKE', '%' . $busqueda. '%')->orwhere('apellido', 'LIKE', '%' . $busqueda. '%');
        $personas = $personas->where('estado', true)->orderBy('apellido')->get();
        $resultado = array();
        if(!$personas->isEmpty()){
            foreach ($personas as $persona){
                $persona = persona::find($persona->id);
                $resultado[] = array('id'=>$persona->id, 'fila'=>$persona->mostrar());      
            }
        } else {
            $resultado[] = array('id'=>'', 'fila'=>'Sin resultados');   
        }
        return $resultado;
    }

    public function importar(Request $request)
    {   
        $file = $request->file('excel');
        $file->move(base_path('archivos'), $file->getClientOriginalName());
        $archivoexcel = base_path('archivos/').$file->getClientOriginalName();
        $excel = Excel::toCollection(new PersonasImport, $archivoexcel);
		unlink($archivoexcel);
        $listado = collect();
        foreach($excel as $hojas)
        {
            foreach ($hojas as $filas) 
            {          
                $nuevapersona = [];
                $nuevapersona = Arr::add($nuevapersona, "dni", $filas["dni"]);
                $nuevapersona = Arr::add($nuevapersona, "apellido", $filas["apellido"]);
                $nuevapersona = Arr::add($nuevapersona, "nombre", $filas["nombre"]);
                $fechanacimiento = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($filas["fecha_nacimiento"]));
                $fechanacimiento  = $fechanacimiento->format('d/m/Y');
                $nuevapersona = Arr::add($nuevapersona, "fecha_nacimiento", $fechanacimiento);               
                $nuevapersona = Arr::add($nuevapersona, "telefono", $filas["telefono"]);
                $nuevapersona = Arr::add($nuevapersona, "email", $filas["email"]);
                if($filas["dni"] && $filas["apellido"] && $filas["nombre"])
                {
                    $existe = Persona::where('dni', $filas["dni"])->get()->first();
                    if(!$existe)
                    {
                        try {
                            $persona = new Persona();
                            $persona->dni = $filas["dni"];
                            $persona->apellido = $filas["apellido"];
                            $persona->nombre = $filas["nombre"];
                            $persona->fecha_nacimiento = Carbon::createFromFormat('d/m/Y', $fechanacimiento)->format('Y-m-d');
                            $persona->telefono = $filas["telefono"];
                            ($filas["email"]) ? $persona->email = $filas["email"] : $persona->email = null;
                            $persona->save();
                            $nuevapersona = Arr::add($nuevapersona, "mensaje", "Correcto");
                        } catch (Exception $e) {
                            $nuevapersona = Arr::add($nuevapersona, "mensaje", $e);
                        }
                    }
                    else 
                    {
                        $nuevapersona = Arr::add($nuevapersona, "mensaje", "ya existe en la base de datos");               

                    }
                }
                else
                {
                    $nuevapersona = Arr::add($nuevapersona, "mensaje", "No se registro porque no tiene dni, apellido /o nombre");
                }
                $listado->push($nuevapersona);
            }            
        }
        $listado = collect($listado->all());
        $personas = cargar_personas();
        return $listado->downloadExcel('resultado.xlsx', $writerType = null, $headings = true);
    }

    public function listar_eliminados()
    {
        $personas = cargar_eliminados();
        $eliminados = true;
        $opciones = true;
        return view('personas.listar', compact('personas', 'opciones','eliminados'));
    }

    public function recuperar_eliminado($id)
    {
        $correcto = true;
        try {
            $persona = Persona::findorfail($id);
            $persona->estado = true;
            $persona->save();
            $mensaje = 'Se recupero a ' . $persona->mostrar();
        } catch (\Throwable $th) {
            $correcto = false;
        }
        $personas = cargar_eliminados();
        $eliminados = true;
        $opciones = true;
        return view('personas.listar', compact('personas', 'opciones', 'eliminados', 'mensaje', 'correcto'));
    }
}

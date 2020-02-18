<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriaFoto;
use App\Persona;

class GaleriaFotoController extends Controller
{
    public function cargar_foto(Request $request , Persona $persona)
    {
    	$this->validate($request, [
    		'titulo' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ruta = 'public\archivos\fotos\\'.$persona->id.'\\';
        $file = $request->file('foto');        
        $file->move(base_path($ruta), $file->getClientOriginalName());
        
        try
        {
            $foto_cargada = new GaleriaFoto();
            $foto_cargada->titulo = $request->titulo;
            $foto_cargada->foto = $file->getClientOriginalName();
            $foto_cargada->persona_id = $persona->id;
            $foto_cargada->save();
            $correcto = true;
            $mensaje = "La foto se cargó correctamente";
        } catch (Excepction $e) {
            return $e->getMessage();
        }
      
        return view('personas.detalles.historiaclinica.tablagaleriafotos', compact('persona','correcto', 'mensaje'));
    	
    }

    public function eliminar(Persona $persona, $id)
    {
        $correcto = true;
        $foto = GaleriaFoto::findorfail($id);
        $archivofoto = base_path('public\archivos\fotos\\').$persona->id.'\\'.$foto->foto;
        unlink($archivofoto);
        
        try {
            $foto->delete();
            $mensaje = 'Se eliminó la foto';
        } catch (\Throwable $th) {
            $correcto = false;
        }
        return view('personas.detalles.historiaclinica.tablagaleriafotos', compact('persona','correcto', 'mensaje'));
    }


}

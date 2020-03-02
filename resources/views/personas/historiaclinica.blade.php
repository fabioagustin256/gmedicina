@extends('plantilla')

@section('css')
    <link rel="stylesheet" href="{{ url ('css/icono-eliminar.css') }}">
    <link rel="stylesheet" href="{{ url ('editor/css/editor.dataTables.css') }}">
@endsection

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('personas.index') }}" role="button">Volver al listado</a>

    <br><br>
    <h3 class="text-center">Historia Clínica</h3>

    <br>

    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="datospersonalesHeaderId">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordianId" href="#datospersonalesContentId" aria-expanded="true" aria-controls="datospersonalesContentId">
                        Datos de la persona
                    </a>
                </h5>
            </div>
            <div id="datospersonalesContentId" class="collapse" role="tabpanel" aria-labelledby="datospersonalesHeaderId">
                <div class="card-body">
                    @include('personas.detalles.datospersonales', ['persona' => $persona])
                </div>
            </div>
        </div>
        
        @include('personas.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Antecedentes Ginecobstetricos',
        'personaid'=>$persona->id, 'clase'=>'antecedenteginecobstetrico',  
        'objetos'=>$persona->antecedentes_ginecobstetricos])

        @include('personas.detalles.historiaclinica.ant_pers_patologicos', ['persona'=>$persona])    

        @include('personas.detalles.historiaclinica.seccion1',
        ['titulo' => 'Medicamentos', 'personaid'=>$persona->id, 'clase'=>'medicamento',  
        'objetos'=>$persona->medicamentos])

        @include('personas.detalles.historiaclinica.seccion1',
        ['titulo' => 'Antecedentes Familiares Patológicos', 
        'personaid'=>$persona->id, 'clase'=>'antecedentefamiliarpatologico',  
        'objetos'=>$persona->antecedentes_familiares_patologicos])

        @include('personas.detalles.historiaclinica.laboratorios', ['persona'=>$persona])
    
        @include('personas.detalles.historiaclinica.ecografias', ['persona'=>$persona])  

        @include('personas.detalles.historiaclinica.otros_metodos', ['persona'=>$persona])
        
        @include('personas.detalles.historiaclinica.consultas', ['persona'=>$persona]) 

        @include('personas.detalles.historiaclinica.galeria_fotos', ['persona'=>$persona]) 
    </div>

@endsection

@section('script')
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/agregarfoto.js') }}"></script>    
    <script src="{{ url('js/calendarioes.js') }}"></script>
    <script src="{{ url('js/editaritem.js') }}"></script>
    <script src="{{ url('js/editarmodal.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>    

    <script>
        $(document).ready(function(){
            $(".fecha").datepicker();

            agregaritem("#nuevaantecedenteginecobstetrico", "#formnuevaantecedenteginecobstetrico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedenteginecobstetrico', 'tabla1') )}}", "#tablaantecedenteginecobstetrico");
            actualizaritem("#editarantecedenteginecobstetrico", "#formeditarantecedenteginecobstetrico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedenteginecobstetrico', 'tabla1') )}}", "#tablaantecedenteginecobstetrico");
            editarmodalclase("#editarantecedenteginecobstetrico");

            agregaritem("#nuevaantecedentequirurgico", "#formnuevaantecedentequirurgico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentequirurgico', 'tabla1') )}}", "#tablaantecedentequirurgico");
            actualizaritem("#editarantecedentequirurgico", "#formeditarantecedentequirurgico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentequirurgico', 'tabla1') )}}", "#tablaantecedentequirurgico");
            editarmodalclase("#editarantecedentequirurgico");

            agregaritem("#nuevaalergia", "#formnuevaalergia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'alergia', 'tabla1') )}}", "#tablaalergia");
            actualizaritem("#editaralergia", "#formeditaralergia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'alergia', 'tabla1') )}}", "#tablaalergia");
            editarmodalclase("#editaralergia");

            agregaritem("#nuevainternacion", "#formnuevainternacion", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'internacion', 'tabla1') )}}", "#tablainternacion");
            actualizaritem("#editarinternacion", "#formeditarinternacion", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'internacion', 'tabla1') )}}", "#tablainternacion");
            editarmodalclase("#editarinternacion");
           
            agregaritem("#nuevahabitotoxico", "#formnuevahabitotoxico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'habitotoxico', 'tabla1') )}}", "#tablahabitotoxico");
            actualizaritem("#editarhabitotoxico", "#formeditarhabitotoxico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'habitotoxico', 'tabla1') )}}", "#tablahabitotoxico");
            editarmodalclase("#editarhabitotoxico");           

            agregaritem("#nuevamedicamento", "#formnuevamedicamento", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'medicamento', 'tabla1') )}}", "#tablamedicamento");
            actualizaritem("#editarmedicamento", "#formeditarmedicamento", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'medicamento', 'tabla1') )}}", "#tablamedicamento");
            editarmodalclase("#editarmedicamento");
                        
            agregaritem("#nuevaantecedentefamiliarpatologico", "#formnuevaantecedentefamiliarpatologico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentefamiliarpatologico', 'tabla1') )}}", "#tablaantecedentefamiliarpatologico");
            actualizaritem("#editarantecedentefamiliarpatologico", "#formeditarantecedentefamiliarpatologico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentefamiliarpatologico', 'tabla1') )}}", "#tablaantecedentefamiliarpatologico");
            editarmodalclase("#editarantecedentefamiliarpatologico");

            agregaritem("#nuevolaboratorio", "#formnuevolaboratorio", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'laboratorio', 'tablalaboratorio') )}}", "#tablalaboratorio");
            actualizaritem("#editarlaboratorio", "#formeditarlaboratorio", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'laboratorio', 'tablalaboratorio') )}}", "#tablalaboratorio");
            editarmodalclase("#editarlaboratorio");

            agregaritem("#nuevoecografia", "#formnuevoecografia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'ecografia', 'tablaecografia') )}}", "#tablaecografia");
            actualizaritem("#editarecografia", "#formeditarecografia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'ecografia', 'tablaecografia') )}}", "#tablaecografia");
            editarmodalclase("#editarecografia");

            agregaritem("#nuevootrometodo", "#formnuevootrometodo", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'otrometodo', 'tablaotrometodo') )}}", "#tablaotrometodo");
            actualizaritem("#editarotrometodo", "#formeditarotrometodo", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'otrometodo', 'tablaotrometodo') )}}", "#tablaotrometodo");
            editarmodalclase("#editarotrometodo");

            agregaritem("#nuevoconsulta", "#formnuevoconsulta", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'consulta', 'tablaconsulta') )}}", "#tablaconsulta");
            actualizaritem("#editarconsulta", "#formeditarconsulta", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'consulta', 'tablaconsulta') )}}", "#tablaconsulta");
            editarmodalclase("#editarconsulta");

            agregarfoto("#nuevogaleriafoto", "#formnuevogaleriafoto", "{{ route('galeriafotos.cargar_foto', $persona) }}", "#tablagaleriafoto");
            
        });
    </script>

@endsection
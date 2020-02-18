@extends('plantilla')

@section('css')
    <link rel="stylesheet" href="{{ url ('css/icono-eliminar.css') }}">
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
        ['titulo' => 'Medicamentos', 'nombrecampo'=>'Medicamentos',
        'personaid'=>$persona->id, 'clase'=>'medicamento',  
        'objetos'=>$persona->medicamentos])

        @include('personas.detalles.historiaclinica.laboratorios', ['persona'=>$persona])
        
        @include('personas.detalles.historiaclinica.ecografias', ['persona'=>$persona])  

        @include('personas.detalles.historiaclinica.otros_metodos', ['persona'=>$persona])
        
        @include('personas.detalles.historiaclinica.consultas', ['persona'=>$persona]) 

        @include('personas.detalles.historiaclinica.galeria_fotos', ['persona'=>$persona]) 
    </div>

@endsection

@section('script')
    <script src="{{ url('jquery/js/jquery.fancybox.js') }}" ></script>
    <script src="{{ url('js/agregaritem.js') }}"></script>
    <script src="{{ url('js/agregarfoto.js') }}"></script>    
    <script src="{{ url('js/calendarioes.js') }}"></script>
    <script src="{{ url('js/quitaritem.js') }}"></script>
    

    <script>
        $(document).ready(function(){
            agregaritem("#nuevaantecedenteginecobstetrico", "#formnuevaantecedenteginecobstetrico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedenteginecobstetrico', 'tabla1') )}}", "#tablaantecedenteginecobstetrico");
            
            agregaritem("#nuevaantecedentequirurgico", "#formnuevaantecedentequirurgico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentequirurgico', 'tabla1') )}}", "#tablaantecedentequirurgico");
            agregaritem("#nuevaalergia", "#formnuevaalergia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'alergia', 'tabla1') )}}", "#tablaalergia");
            agregaritem("#nuevainternacion", "#formnuevainternacion", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'internacion', 'tabla1') )}}", "#tablainternacion");
            agregaritem("#nuevahabitotoxico", "#formnuevahabitotoxico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'habitotoxico', 'tabla1') )}}", "#tablahabitotoxico");

            agregaritem("#nuevamedicamento", "#formnuevamedicamento", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'medicamento', 'tabla1') )}}", "#tablamedicamento");

            $("#fechalaboratorio").datepicker();
            agregaritem("#nuevolaboratorio", "#formnuevolaboratorio", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'laboratorio', 'tablalaboratorio') )}}", "#tablalaboratorio");

            $("#fechaecografia").datepicker();
            agregaritem("#nuevoecografia", "#formnuevoecografia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'ecografia', 'tablaecografia') )}}", "#tablaecografia");

            $("#fechaotrometodo").datepicker();
            agregaritem("#nuevootrometodo", "#formnuevootrometodo", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'otrometodo', 'tablaotrometodo') )}}", "#tablaotrometodo");

            $("#fechaconsulta").datepicker();
            agregaritem("#nuevoconsulta", "#formnuevoconsulta", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'consulta', 'tablaconsulta') )}}", "#tablaconsulta");

            agregarfoto("#nuevogaleriafoto", "#formnuevogaleriafoto", "{{ route('galeriafotos.cargar_foto', $persona) }}", "#tablagaleriafoto");
            
        });
    </script>

@endsection
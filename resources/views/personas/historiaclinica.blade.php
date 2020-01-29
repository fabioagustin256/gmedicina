@extends('plantilla')

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

        @include('personas.detalles.ant_pers_patologicos', ['persona'=>$persona])    

        @include('personas.detalles.historiaclinica.seccion1',
        [ 'titulo' => 'Medicamentos', 'nombrecampo'=>'Medicamentos',
        'personaid'=>$persona->id, 'clase'=>'medicamento',  
        'objetos'=>$persona->medicamentos])

    </div>

@endsection

@section('script')
    <script src="{{ url('js/agregaritem.js') }}"></script>

    <script>
        $(document).ready(function(){
            agregaritem("#nuevaantecedenteginecobstetrico", "#formnuevaantecedenteginecobstetrico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedenteginecobstetrico') )}}", "#tablaantecedenteginecobstetrico");
            
            agregaritem("#nuevaantecedentequirurgico", "#formnuevaantecedentequirurgico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'antecedentequirurgico') )}}", "#tablaantecedentequirurgico");
            agregaritem("#nuevaalergia", "#formnuevaalergia", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'alergia') )}}", "#tablaalergia");
            agregaritem("#nuevainternacion", "#formnuevainternacion", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'internacion') )}}", "#tablainternacion");
            agregaritem("#nuevahabitotoxico", "#formnuevahabitotoxico", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'habitotoxico') )}}", "#tablahabitotoxico");

            agregaritem("#nuevamedicamento", "#formnuevamedicamento", "{{ route('historiaclinica.clase.agregar', array($persona->id, 'medicamento') )}}", "#tablamedicamento");

        });
    </script>

@endsection
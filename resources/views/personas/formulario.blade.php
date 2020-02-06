@extends('plantilla')

@section('contenido')
    <a class="btn btn-primary float-right" href="{{ route('personas.index') }}" role="button">Volver al listado</a>
    <br><br>
    
    <h5>Ingrese los datos de la persona:</h5>

    <br>

    @isset($correcto)
        @include('formularios.mensajes', ['mensaje' => $mensaje, 'correcto'=> $correcto])
    @endisset

    <form action="{{ isset($persona)?route('personas.update', $persona):route('personas.store')}}" method="POST">
        @csrf

        @isset($persona)
            @method('PUT')
        @endisset

        @if($errors->any())
            @include('formularios.mensajes', ['campo'=>'apellido'])
            @include('formularios.mensajes', ['campo'=>'nombre'])
        @endif

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Campos obligatorios</legend>  
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" pattern="[0-9]{8}" placeholder="DNI sin puntos(.)" value="{{ isset($persona)?$persona->dni:old('dni') }}" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ isset($persona)?$persona->nombre:old('nombre') }}" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="{{ isset($persona)?$persona->apellido:old('apellido') }}" required>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="fecha_nacimiento" class="col-form-label">Fecha de nacimiento</label>
                    <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ isset($persona->fecha_nacimiento)?date('d/m/Y', strtotime($persona->fecha_nacimiento)):old('fecha_nacimiento') }}">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="sexo" class="col-form-label">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="Sin información">Sin información</option>  
                        <option value="Masculino">Masculino</option>  
                        <option value="Femenino">Femenino</option>  
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estado_civil" class="col-form-label">Estado Civil</label>
                    <div id="estado_civil">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="ocupacion" class="col-form-label">Ocupación</label>
                    <div id="ocupacion">
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="obra_social" class="col-form-label">Obra Social</label>
                    <div id="obra_social">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ isset($persona)?$persona->telefono:old('telefono') }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio" value="{{ isset($persona)?$persona->domicilio:old('domicilio') }}">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ isset($persona)?$persona->email:old('email') }}">
                </div>
            </div>
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
@endsection


@section('script')
    <script src="{{ url('js/calendarioes.js') }}"></script>
    <script src="{{ url('js/elegircampo.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#fecha_nacimiento").datepicker();
            @isset($persona->sexo)
                $("#sexo").val("{{ $persona->sexo }}");
            @endisset
            elegircampo("estado_civil", "{{ route('estadosciviles.listar')}}", {{ isset($persona->estado_civil)?$persona->estado_civil_id:"" }});
            elegircampo("ocupacion", "{{ route('ocupaciones.listar') }}", {{ isset($persona->ocupacion)?$persona->ocupacion_id:"" }});
            elegircampo("obra_social", "{{ route('obrassociales.listar') }}", {{ isset($persona->obra_social)?$persona->obra_social_id:"" }});              
        });
    </script>

@endsection
@extends('plantilla')

@section('contenido')

    <h3>Listado de personas</h3>

    <br>
                
    @include('personas.listado.filtros')       
    
    <br><br>

    <div class="row">
        <div class="col-sm-6">
            <form method="POST" id="buscarpersona">
                @csrf

                @include('formularios.autocompletado', ['nombrecampo'=>'Buscar', 'campo'=>'buscar'])           
        </div>
        <div class="col-sm-4">
                <button type="submit" class="btn btn-success">Filtrar</button>
                <button type="button" class="btn btn-primary" onclick="resetearfiltros('{{ route('resetearfiltrospersonas') }}', '#tablapersonas')">
                    Mostrar todo
                </button>
            </form>
        </div>
        <div class="col-sm-1 text-sm-right">
            @isset(Auth::user()->role)
                @if( Auth::user()->role->name  == "admin" )
                    <form action="{{ route('personas.importar') }}" method="POST" class="form-row float-right" role="form" enctype="multipart/form-data">
                        @csrf
                        <label class="btn btn-success">
                            Importar <input type="file" hidden name="excel" onchange="this.form.submit()">
                        </label>
                    </form> 
                @endif
            @endisset
        </div>
        <div class="col-sm-1 text-sm-right">     
            <a class="btn btn-primary" href="{{ route('personas.create') }}" role="button">Agregar</a>
        </div>
    </div>
    
    <br>

    <span id="tablapersonas">
        @include('personas.listado.tabla', ['personas' => $personas]) 
    </span>

    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('personas.destroy', 'idpersona') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarLabel">ADVERTENCIA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="mensaje" class="text-center"></div>
                        <input type="hidden" name="personaid" id="personaid" value="">                   
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Si</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ url('js/filtrar.js') }}"></script>
    <script src="{{ url('js/resetearfiltros.js') }}"></script>
    <script src="{{ url('js/autocompletar.js') }}"></script>

    <script>
        $(document).ready(function(){
            autocompletar("#buscar", "{{ route('buscarpersona') }}");
            filtrar("{{ route('filtrarpersonas') }}", "#filtrospersonas", "#tablapersonas");
            filtrar("{{ route('filtrarpersonas') }}", "#buscarpersona", "#tablapersonas");  

            $("#eliminar").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var personaid = button.data('personaid');
                var apellido = button.data('apellido');
                var nombre = button.data('nombre');
                
                var modal = $(this);
                modal.find(".modal-body #mensaje").html("¿Está seguro que desea eliminar a " + nombre + " " + apellido + "?");
                modal.find(".modal-body #personaid").val(personaid);
            });          
        });
    </script>
@endsection
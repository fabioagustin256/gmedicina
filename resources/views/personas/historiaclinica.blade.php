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

    </div>

@endsection


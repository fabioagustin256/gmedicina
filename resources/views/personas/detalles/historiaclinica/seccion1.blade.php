<div class="card">
    <div class="card-header" role="tab" id="{{ $clase }}HeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#{{ $clase }}ContentId" aria-expanded="true" aria-controls="{{ $clase }}ContentId">
                {{ $titulo }}
            </a>
        </h5>
    </div>
    <div id="{{ $clase }}ContentId" class="collapse" role="tabpanel" aria-labelledby="{{ $clase }}HeaderId">
        <div class="card-body">
            <div id="tabla{{ $clase }}persona">
                @include('personas.detalles.historiaclinica.listar1', 
                    ['clase'=>$clase, 'personaid'=>$personaid, 'objetos'=>$objetos])  
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" role="tab" id="ant_pers_patologicosHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#ant_pers_patologicosContentId" aria-expanded="true" aria-controls="ant_pers_patologicosContentId">
                Antecedentes personales patológicos
            </a>
        </h5>
    </div>

    <div id="ant_pers_patologicosContentId" class="collapse" role="tabpanel" aria-labelledby="ant_pers_patologicosHeaderId">
        <div class="card-body">
            @include('personas.detalles.historiaclinica.seccion1',
            [ 'titulo' => 'Antecedentes Quirurgicos', 'personaid'=>$persona->id, 
            'clase'=>'antecedentequirurgico', 'objetos'=>$persona->antecedentes_quirurgicos])

            @include('personas.detalles.historiaclinica.seccion1',
            [ 'titulo' => 'Alergias', 'personaid'=>$persona->id, 
            'clase'=>'alergia', 'objetos'=>$persona->alergias])

            @include('personas.detalles.historiaclinica.seccion1',
            [ 'titulo' => 'Internaciones', 'personaid'=>$persona->id, 
            'clase'=>'internacion', 'objetos'=>$persona->internaciones])

            @include('personas.detalles.historiaclinica.seccion1',
            [ 'titulo' => 'Hábitos Tóxicos', 'personaid'=>$persona->id, 
            'clase'=>'habitotoxico', 'objetos'=>$persona->habitos_toxicos])
        </div>
    </div>

</div>
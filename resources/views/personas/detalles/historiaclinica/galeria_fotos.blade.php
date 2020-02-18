<div class="card">
    <div class="card-header" role="tab" id="galeriafotoHeaderId">
        <h5 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordianId" href="#galeriafotoContentId" aria-expanded="true" aria-controls="galeriafotoContentId">
                Fotos
            </a>
        </h5>
    </div>
    <div id="galeriafotoContentId" class="collapse" role="tabpanel" aria-labelledby="galeriafotoHeaderId">
        <div class="card-body">              
            <div id="tablagaleriafotopersona">                 
                <p>
                    <a class="btn btn-success" data-toggle="collapse" href="#nuevogaleriafoto" role="button" aria-expanded="false" aria-controls="collapseclase">
                        Agregar
                    </a>
                </p>

                <div class="collapse" id="nuevogaleriafoto">
                    <div class="card card-body"> 
                        <form action="{{ route('galeriafotos.cargar_foto', $persona) }}" class="form-image-upload" method="POST" enctype="multipart/form-data" id="formnuevogaleriafoto">
                            
                            @csrf

                            <div class="row">
                                <div class="col-md-5">
                                    <strong>Título:</strong>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                                </div>
                                <div class="col-md-5">
                                    <strong>Foto:</strong>
                                    <input type="file" name="foto" id="foto" class="form-control" required>
                                </div>
                                <div class="col-md-2">
                                    <br/>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <span id="tablagaleriafoto">
                    @include('personas.detalles.historiaclinica.tablagaleriafotos', ['persona'=> $persona])
                </span>
            </div>
        </div>
    </div>
</div>
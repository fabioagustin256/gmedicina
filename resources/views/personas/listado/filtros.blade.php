<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Filtrar
    </a>
</p>
<div class="collapse" id="collapseExample">    
    <form method="POST" id="filtrospersonas">
        @csrf

        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="mes_nacimiento" class="col-form-label">Mes nacimiento</label>
                    <select name="mes_nacimiento" id="mes_nacimiento" class="form-control">
                        <option value="Sin información">Sin información</option>  
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>    
                        <option value="03">Marzo</option>    
                        <option value="04">Abril</option>    
                        <option value="05">Mayo</option>    
                        <option value="06">Junio</option>    
                        <option value="07">Julio</option>    
                        <option value="08">Agosto</option>    
                        <option value="09">Septiembre</option>    
                        <option value="10">Octubre</option>    
                        <option value="11">Noviembre</option>    
                        <option value="12">Diciembre</option>
                    </select>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success">Listar</button>
    </form> 
</div>
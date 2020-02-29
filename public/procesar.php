    <input type="hidden" id="procesarData"/>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h2 class="h3">3. Procesar data.</h2>
            <h3 class="h5">HABILIDADES:</h3>
            <pre class="alert alert-secondary"><code>PHP, MYSQL</code></pre>
            <h3 class="h5">PROBLEMA:</h3>
            <div class="card">
                <div class="card-body">
                    En algunos casos necesitamos calcular el precio del alquiler por zona. Para ello necesitamos procesar la información de nuestra base de datos.
                </div>
            </div>
            <br>
            <h3 class="h5">REQUERIMIENTO:</h3> 
            <p>Se necesita una función en la cual se pasen 3 atributos (Latitud, Longitud, Distancia km), y está retorne el precio promedio del metro cuadrado.</p>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3 class="h5">Formula encontrada en:</h3>
                    <a href="http://www.pabloblanco.es/sql-obtener-coordenadas-en-radio-de-accion/" target="_blank">http://www.pabloblanco.es/sql-obtener-coordenadas-en-radio-de-accion</a><br>
                    6371 es el radio medio de la tierra medido en Km. Se usa el radio medio porque no en todos los puntos es igual (en los polos es 6357 Km y en el ecuador 6378 Km).
                </div>
            </div>
            <br>
            <b>Ejemplo:</b><br>
            Latitud: <i>40.3645198</i><br>
            Longitud: <i>-3.5832921</i><br>
            Distancia: <i>1</i><br>
            <br>
        </div>
    </div>
    <br>

    <form class="form-procesar" action="">
        <div class="row">
            <div class="col">
                <input type="text" name="latitud" class="form-control" placeholder="Latitud" value="40.3645198">
            </div>
            <div class="col">
                <input type="text" name="longitud" class="form-control" placeholder="Longitud" value="-3.5832921">
            </div>
            <div class="col">
                <input type="text" name="distancia" class="form-control" placeholder="Distancia" value="1">
            </div>
            <div class="col">
                <button type="button" class="btn btn-success procesarData"><i class="fas fa-play"></i> Procesar</button>
            </div>
        </div>
    </form>
    <br><br>

    <div class="row">
        <div class="col">
            <div class="totalData"></div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Título</th>
                            <th>Precio</th>
                            <th>Distancia</th>
                        </tr>
                    </thead>
                    <tbody class="tBodyData">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="filtrarRegistros"/>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h2 class="h3">2. Filtrar data.</h2>
            <h3 class="h5">HABILIDADES:</h3>
            <pre class="alert alert-secondary"><code>PHP, MYSQL</code></pre>
            <h3 class="h5">PROBLEMA:</h3>
            <div class="card">
                <div class="card-body">
                    Basado en el ejercicio #1 ya tenemos una base de datos funcional. Ahora necesitamos poder filtrar la data.
                </div>
            </div>
            <br>
            <h3 class="h5">REQUERIMIENTO:</h3> 
            <p>Se requiere un endpoint método GET el cual permita pasar atributos y poder filtrar el resultado de la data por:</p>
            <ul>
                <li>Rango de precio mínimo y máximo.</li>
                <li>Número de habitaciones.</li>
            </ul>
        </div>
    </div>
    <br><br>

    <form class="form-busqueda" action="">
        <div class="row">
            <div class="col">
                <input type="number" name="rangoPrecioMin" class="form-control" placeholder="Precio Mínimo">
            </div>
            <div class="col">
                <input type="number" name="rangoPrecioMax" class="form-control" placeholder="Precio Máximo">
            </div>
            <div class="col">
                <input type="number" name="habitaciones" class="form-control" placeholder="Número de habitaciones">
            </div>
            <div class="col">
                <button type="button" class="btn btn-success buscarData"><i class="fas fa-search"></i> Filtrar</button>
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
                            <th>Habitaciones</th>
                        </tr>
                    </thead>
                    <tbody class="tBodyData">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" id="reportesData"/>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h2 class="h3">4. Reportes data.</h2>
            <h3 class="h5">HABILIDADES:</h3>
            <pre class="alert alert-secondary"><code>PHP, MYSQL, PDF</code></pre>
            <h3 class="h5">PROBLEMA:</h3>
            <div class="card">
                <div class="card-body">
                    En ocasiones se necesita generar reportes para el área administrativa, estos reportes deben ser en formato (PDF, CSV)
                </div>
            </div>
            <br>
            <h3 class="h5">REQUERIMIENTO:</h3> 
            <p>Se requiere un endpoint al cual se pasen los atributos de filtro, coordenadas y tipo de reporte (PDF, CSV) y dicho reporte generado se guarda en una carpeta.</p>
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
                <select name="tipoReporte" class="form-control">
                    <option value="pdf">PDF</option>
                    <option value="csv">CSV</option>
                </select>
            </div>
            <div class="col">
                <button type="button" class="btn btn-success buscarData"><i class="fas fa-file-pdf"></i> Generar Reporte</button>
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
                            <th>Nombre</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    <tbody class="tBodyData">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
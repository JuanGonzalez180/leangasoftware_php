    <input type="hidden" id="cargarRegistros"/>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div>
            <h2 class="h3">1. Importación de data.</h2>
            <h3 class="h5">HABILIDADES:</h3>
            <pre class="alert alert-secondary"><code>PHP, MYSQL</code></pre>
            <h3 class="h5">PROBLEMA:</h3>
            <div class="card">
                <div class="card-body">
                    El siguiente archivo (.csv) contiene una seria de datos relacionados con el comercio inmobiliario. Ejemplo (Dirección del piso, Metros cuadrados, Características, entre otros)
                </div>
            </div>
            <br>
            <h3 class="h5">REQUERIMIENTO:</h3> 
            <p>El objetivo principal es crear un método en la clase, al cual se indique la ruta del archivo y esta sea capaz de leer el (.csv) e insertar los valores en una base de datos MySQL.</p>
        </div>
    </div>
    <div>
        <div class="importaData d-none">
          <button type="button" class="btn btn-info importData">Importar Archivos CSV</button>
          <br><br>
        </div>

        <div class="clearData d-none">
          Existen <span class="totalRegistros"></span> registros en la base de datos<br>
          <button type="button" class="btn btn-danger removeRegistros">Limpiar Registros en BD</button>
        </div>
    </div>
    <br><br>
    
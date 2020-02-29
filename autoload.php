<?php

// No mostrar errores
 error_reporting(-1);
// error_reporting(E_ALL);

require 'vendor/autoload.php';

// Vars
require 'vars/global.php';
// Clases

// Libs
require 'libs/MySQL.php';
require 'libs/GetSQLValueString.php';

// Class
require 'class/comercioInmobiliario.php';

/*$comercio = new comercioInmobiliario();

$funcion = 'import';

if( $funcion == 'clear' ){
    $comercio->clearData();
}

if( $funcion == 'import' ){
    // Importar Datos.
    print __DIR__ . 'assets/resource_accommodation.csv';
    $result = $comercio->importData( 'assets/resource_accommodation.csv' );
    if( $result["registrados"]){
        print sprintf('Se han registrado %s filas en la base de datos </br>', $result["registrados"]);
    }
    if( $result["errores"] ){
        print sprintf('%s filas no fueron registrados, probablemente ya se encuentran registrados </br>', $result["errores"]);
    }
}

if( $funcion == 'filter' ){
    $rangoPrecioMin = '';
    $rangoPrecioMax = '';
    $habitaciones = '';
    
    $result = $comercio->filtrarData( $rangoPrecioMin, $rangoPrecioMax, $habitaciones );
}

if( $funcion == 'procesar' ){
    $comercio->promedioMetroCuadrado( '40.3645198', '-3.5832921', 1 );
}

if( $funcion == 'export' ){
    $rangoPrecioMin = '';
    $rangoPrecioMax = '';
    $habitaciones = '';

    $tipoReporte = 'csv';
    
    $result = $comercio->filtrarData( $rangoPrecioMin, $rangoPrecioMax, $habitaciones );
    $comercio->export( $result, $tipoReporte );
}*/
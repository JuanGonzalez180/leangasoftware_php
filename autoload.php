<?php

// No mostrar errores
// error_reporting(-1);
// error_reporting(E_ALL);

// Variable de Session
session_start();

// Vars
require 'vars/global.php';
// Clases
require 'class/conection.php';
// Functions
require 'includes/global.php';

require 'class/comercioInmobiliario.php';

$rapConection  = new raConection(V_HOSTNAME, V_USERNAME, V_PASSWORD, V_DATABASE, V_TYPE);
$insConection = $rapConection->connect();

// Variable Global
$GLOBAL['clsConection'] = $insConection;

$funcion = 'importar';
if( $funcion == 'importar' ){
    // Importar Datos.

}

$comercio = new comercioInmobiliario();
print __DIR__ . 'assets/resource_accommodation.csv';
// $comercio->importData( __DIR__ . 'assets/resource_accommodation.csv' );

/*
$user = $raUser->raLogin( $username, $password );

if( $user ){
}*/
<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$lat = (isset($_GET['latitud'])) ? $_GET['latitud'] : '';
$lon = (isset($_GET['longitud'])) ? $_GET['longitud'] : '';
$distancia = (isset($_GET['distancia'])) ? $_GET['distancia'] : '';

$result = $comercio->promedioMetroCuadrado( $lat, $lon, $distancia );
echo json_encode($result);

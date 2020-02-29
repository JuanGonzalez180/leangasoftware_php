<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$rangoPrecioMin = (isset($_GET['rangoPrecioMin'])) ? $_GET['rangoPrecioMin'] : '';
$rangoPrecioMax = (isset($_GET['rangoPrecioMax'])) ? $_GET['rangoPrecioMax'] : '';
$habitaciones = (isset($_GET['habitaciones'])) ? $_GET['habitaciones'] : '';

$result = $comercio->filtrarData( $rangoPrecioMin, $rangoPrecioMax, $habitaciones );
echo json_encode($result);
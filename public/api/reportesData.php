<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$rangoPrecioMin = (isset($_GET['rangoPrecioMin'])) ? $_GET['rangoPrecioMin'] : '';
$rangoPrecioMax = (isset($_GET['rangoPrecioMax'])) ? $_GET['rangoPrecioMax'] : '';
$habitaciones = (isset($_GET['habitaciones'])) ? $_GET['habitaciones'] : '';
$tipoReporte = (isset($_GET['tipoReporte'])) ? $_GET['tipoReporte'] : 'pdf';

$resultExport = $comercio->filtrarData( $rangoPrecioMin, $rangoPrecioMax, $habitaciones );
$comercio->export( $resultExport, $tipoReporte );
$result = $comercio->showFiles();

echo json_encode($result);
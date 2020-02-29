<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$result = $comercio->importData( '../../assets/resource_accommodation.csv' );
echo json_encode($result);
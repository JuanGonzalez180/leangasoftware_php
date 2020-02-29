<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$result = $comercio->clearData();
echo json_encode($result);
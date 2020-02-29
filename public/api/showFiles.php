<?php

header('Content-Type: application/json');
include '../../autoload.php';

$comercio = new comercioInmobiliario();

$result = $comercio->showFiles();

echo json_encode($result);
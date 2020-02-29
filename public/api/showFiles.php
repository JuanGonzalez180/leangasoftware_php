<?php

header('Content-Type: application/json');
include '../../autoload.php';

define('_rutaDir', __DIR__ . '/../reports/' );
$comercio = new comercioInmobiliario();

$result = $comercio->showFiles();

echo json_encode($result);
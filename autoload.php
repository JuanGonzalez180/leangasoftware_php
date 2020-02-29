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

define('_rutaDir', __DIR__ . '/public/reports/' );
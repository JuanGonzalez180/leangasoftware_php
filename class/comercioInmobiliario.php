<?php

class comercioInmobiliario{

    public function __construct(){

    }

    public function importData( $ruta ){
        $handle = fopen( $ruta , "r");
        while (($data = fgetcsv($handle)) !== FALSE) {
            var_dump($data);
        }
    }

    
}
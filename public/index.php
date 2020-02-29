<?php
    $ver = '?0.001';
    session_start();

    define('_urlSite', 'http://localhost/leangasoftware/leangasoftware_php/public/');

    $archivo_actual = 'inicio';
    if(isset($_GET['page'])){
        $archivo_actual = $_GET['page'];
    }

    include 'header.php';
    print '<input type="hidden" class="_urlSite" value="'._urlSite.'"/>';

    if( $archivo_actual && file_exists( $archivo_actual . '.php' ) ){
        require_once(basename(($archivo_actual!='' ? $archivo_actual : 'inicio') . '.php'));
    }

    include 'footer.php';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
        <!--meta info-->

        <script src="https://kit.fontawesome.com/89237db474.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php print _urlSite; ?>assets/css/dashboard.css">

        <title>Prueba PHP</title>
    </head>
    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Prueba PHP</a>
            <div class="col-sm-9 col-md-10">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="float: right;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link <?php print ($archivo_actual == 'inicio' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>">
                                <span data-feather="home"></span>
                                Importar CSV <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php print ($archivo_actual == 'filtrar' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>filtrar">
                                <span data-feather="file"></span>
                                Filtrar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php print ($archivo_actual == 'procesar' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>procesar">
                                <span data-feather="shopping-cart"></span>
                                Procesar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php print ($archivo_actual == 'reportes' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>reportes">
                                <span data-feather="users"></span>
                                Reportes
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php print ($archivo_actual == 'inicio' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>">
                                <span data-feather="home"></span>
                                Importar CSV <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php print ($archivo_actual == 'filtrar' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>filtrar">
                                <span data-feather="file"></span>
                                Filtrar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php print ($archivo_actual == 'procesar' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>procesar">
                                <span data-feather="shopping-cart"></span>
                                Procesar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php print ($archivo_actual == 'reportes' ? 'active' : '' ) ?>" href="<?php print _urlSite; ?>reportes">
                                <span data-feather="users"></span>
                                Reportes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
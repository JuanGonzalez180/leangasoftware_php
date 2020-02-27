<?php

// reference the Dompdf namespace
use Dompdf\Dompdf;

class comercioInmobiliario{
    private $getSQL;
    private $mysql;
    private $ruta = 'reports/';

    public function __construct(){
        $mysql  = new MySQL();
        $this->mysql = $mysql->get();

        $this->getSQL = new GetSQLValueString;
    }

    public function importData( $ruta ){
        $resp['code'] = 500;

        // Read CSV:
        $csvFile = file( $ruta );
        $i = 0;

        $textSQL = "INSERT INTO `comercio` (`inm_latitud`, `inm_longitud`, `ID`, `inm_titulo`, `inm_anunciante`, `inm_descripcion`, `inm_reformado`, `inm_telefonos`, `inm_tipo`, `inm_precio`, `inm_precio_por_metro`, `inm_direccion`, `inm_provincia`, `inm_ciudad`, `inm_metros_cuadrados`, `inm_habitaciones`, `inm_banos`, `inm_parking`, `inm_segunda_mano`, `inm_armarios_empotrados`, `inm_construido_en`, `inm_amueblado`, `inm_calefaccion_individual`, `inm_certificacion_energetica`, `inm_planta`, `inm_exterior`, `inm_interior`, `inm_ascensor`, `inm_fecha`, `inm_calle`, `inm_barrio`, `inm_distrito`, `inm_terraza`, `inm_trastero`, `inm_cocina_equipada`, `inm_cocina_equipada_2`, `inm_aire_acondicionado`, `inm_piscina`, `inm_jardin`, `inm_metros_cuadrados_utiles`, `inm_apto_movilidad_reducida`, `inm_plantas`, `inm_mascotas`, `inm_balcon`) VALUES (%s)";

        $resp = [];
        $registrados = 0;
        $errores = 0;
        
        if( !count($csvFile) ){
            $resp['code'] = 200;
            return $resp;
        }

        foreach ($csvFile as $line) {
            $data = str_getcsv($line);
            // Data
            if( $i !== 0 ){
                // Ingresar Valores   
                // getSQL->get valida caracteres especiales y demás.
                $values = implode(', ', array_map(
                                            function($val){
                                                return $this->getSQL->get( $val, "text");
                                            }, 
                                        $data)
                                );
                $sql = sprintf( $textSQL, $values );
                $rsSQL = $this->mysql->query( $sql );
                if( $rsSQL ){
                    $registrados++;
                }else{
                    $errores++;
                }
            }
            $i++;
        }

        $this->mysql->close();
        $resp['registrados'] = $registrados;
        $resp['errores'] = $errores;
        return $resp;
    }

    public function clearData(){
        $resp = [];
        $resp['code'] = 500;
        
        $sql = 'DELETE FROM comercio';
        $rsSQL = $this->mysql->query( $sql );
        
        if( $rsSQL ){
            $resp['code'] = 200;
        }
        $this->mysql->close();

        return $resp;
    }

    public function filtrarData( $rangoPrecioMin, $rangoPrecioMax, $habitaciones ){
        $resp = [];
        $resp['code'] = 500;
        $resp['message'] = [];
        $error = false;

        $concatenar = [];
        
        // Validaciones
        if( $rangoPrecioMax < $rangoPrecioMin ){
            $error = true;
            $resp['message'][] = 'El precio Máximo no puede ser menor que el precio Minimo';
        }

        if( $rangoPrecioMin && !is_numeric($rangoPrecioMin) ){
            $error = true;
            $resp['message'][] = 'El precio mínimo no es un numero';
        }

        if( $rangoPrecioMax && !is_numeric($rangoPrecioMax) ){
            $error = true;
            $resp['message'][] = 'El precio máximo no es un numero';
        }

        if( $habitaciones && !is_numeric($habitaciones) ){
            $error = true;
            $resp['message'][] = 'Las habitaciones suministradas no es un numero';
        }

        // Si existe error salir.
        if( $error ){
            return $resp;
        }

        // Armar condicionales
        if( $rangoPrecioMin !== '' && $rangoPrecioMin >= 0 ){
            $concatenar[] = sprintf(' inm_precio >= %s ', $this->getSQL->get( $rangoPrecioMin, "text") );
        }

        if( $rangoPrecioMax !== '' && $rangoPrecioMax >= 0 ){
            $concatenar[] = sprintf(' inm_precio <= %s ', $this->getSQL->get( $rangoPrecioMax, "text") );
        }

        if( $habitaciones !== '' && $habitaciones >= 0 ){
            $concatenar[] = sprintf(' inm_habitaciones = %s ', $this->getSQL->get( $habitaciones, "text") );
        }

        $where = '';
        if( count( $concatenar ) ){
            $where = ' WHERE ' .  implode(' AND ', $concatenar );
        }

        $sql = sprintf("SELECT `inm_latitud`, `inm_longitud`, `ID`, `inm_titulo`, `inm_anunciante`, `inm_descripcion`, `inm_reformado`, `inm_telefonos`, `inm_tipo`, `inm_precio`, `inm_precio_por_metro`, `inm_direccion`, `inm_provincia`, `inm_ciudad`, `inm_metros_cuadrados`, `inm_habitaciones`, `inm_banos`, `inm_parking`, `inm_segunda_mano`, `inm_armarios_empotrados`, `inm_construido_en`, `inm_amueblado`, `inm_calefaccion_individual`, `inm_certificacion_energetica`, `inm_planta`, `inm_exterior`, `inm_interior`, `inm_ascensor`, `inm_fecha`, `inm_calle`, `inm_barrio`, `inm_distrito`, `inm_terraza`, `inm_trastero`, `inm_cocina_equipada`, `inm_cocina_equipada_2`, `inm_aire_acondicionado`, `inm_piscina`, `inm_jardin`, `inm_metros_cuadrados_utiles`, `inm_apto_movilidad_reducida`, `inm_plantas`, `inm_mascotas`, `inm_balcon` 
                            FROM comercio %s", $where );
        
        $result = $this->mysql->query( $sql );
        if( $result ){
            $resp['total'] = $result->num_rows;
            $resp['data'] = [];
            while ($fila = $result->fetch_assoc()) {
                $resp['data'][] = $fila;
            }
            $result->free();
            $resp['code'] = 200;
        }

        $this->mysql->close();

        return $resp;
    }

    public function promedioMetroCuadrado( $lat, $lon, $distancia ){

        // 6371 es el radio medio de la tierra medido en Km. Se usa el radio medio porque no en todos los puntos es igual (en los polos es 6357 Km y en el ecuador 6378 Km).
        // http://www.pabloblanco.es/sql-obtener-coordenadas-en-radio-de-accion/
        // ORDER BY distance; 
        $sql = sprintf("SELECT 
                            inm_precio, inm_precio_por_metro, inm_metros_cuadrados, inm_latitud, inm_longitud, 
                            ( 6371 * acos(cos(radians(%s)) * cos(radians(inm_latitud)) * cos(radians(inm_longitud) - radians(%s)) + sin(radians(%s)) * sin(radians(inm_latitud)))) AS distance 
                            FROM comercio HAVING distance <= %s ",
                            $lat,
                            $lon,
                            $lat,
                            $distancia
                        );
        $result = $this->mysql->query( $sql );
        if( $result ){
            $resp['total'] = $result->num_rows;
            $resp['data'] = [];
            $precioAcu = 0;
            while ($fila = $result->fetch_assoc()) {
                $precioAcu += $fila['inm_precio'];
                $resp['data'][] = $fila;
            }
            $resp['promedio'] = $precioAcu/$resp['total'];
            print '<br> promedio: ' . round($resp['promedio']);
            $resp['code'] = 200;

            $result->free();
        }

        $this->mysql->close();

        return $resp;
    }

    public function export( $data, $tipoReporte = 'pdf' ){
        // 
        $nameFile = $this->ruta . 'report-' . date('Ymdhm') . '-' . uniqid();

        if( $tipoReporte === 'pdf' ){
            print 'dompdf';
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml(html_entity_decode('hello world'));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            $output = $dompdf->output();
            file_put_contents( $nameFile . '.pdf' , $output);
        }
        
        if( $tipoReporte === 'csv' ){
            $fp = fopen( $nameFile . '.csv' , 'w');

            foreach ($lista as $campos) {
                fputcsv($fp, $campos);
            }

            fclose($fp);
        }
    }
}
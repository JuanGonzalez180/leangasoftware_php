$(document).ready(function(){
  // 'use strict'

  // filtros registros
  function loadRegistros(data){
    let result = '';
    $.ajax({
      type: 'GET',
      data: data,
      dataType: 'json',
      url: 'api/filtrarData.php',
      async: false,
      success: function( resp ){
        result = resp;
      } 
    });

    return result;
  }

  // procesar datos
  function procesarRegistros(data){
    let result = '';
    $.ajax({
      type: 'GET',
      data: data,
      dataType: 'json',
      url: 'api/procesarData.php',
      async: false,
      success: function( resp ){
        result = resp;
      } 
    });

    return result;
  }

  // filtros registros
  function loadReportes(data){
    let result = '';
    $.ajax({
      type: 'GET',
      data: data,
      dataType: 'json',
      url: 'api/reportesData.php',
      async: false,
      success: function( resp ){
        result = resp;
      } 
    });

    return result;
  }

  function showFiles(data){
    let result = '';
    $.ajax({
      type: 'GET',
      data: data,
      dataType: 'json',
      url: 'api/showFiles.php',
      async: false,
      success: function( resp ){
        result = resp;
      } 
    });

    return result;
  }

  // limpiar registros
  function clearData(){
    let result = '';
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'api/clearData.php',
      async: false,
      success: function( resp ){
        result = resp;
      }
    });

    return result;
  }

  // importar CSV registros
  function importData(){
    let result = '';
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'api/importData.php',
      async: false,
      success: function( resp ){
        result = resp;
      }
    });

    return result;
  }

  function showImport(){
    var resp = loadRegistros('');
    if( resp['total'] ){
      $(".totalRegistros").html( resp['total'] );
      $(".importaData").addClass('d-none');
      $(".clearData").removeClass('d-none');
    }else{
      $(".clearData").addClass('d-none');
      $(".importaData").removeClass('d-none');
    }
  }

  // 
  if( $("#cargarRegistros").length ){
    showImport();

    $(document).on("click", ".removeRegistros", function(){
      let resp = clearData();
      showImport();
    })

    $(document).on("click", ".importData", function(){
      let resp = importData();
      showImport();
    })
    
  }

  // Filtrar
  function filtrarData(){
    var resp = loadRegistros( $(".form-busqueda").serialize() );
    $(".tBodyData").html('');

    if( resp['total'] ){
      resp['data'].forEach(item => {
        $(".tBodyData").append( ` <tr> 
                                    <td>`+item['ID']+`</td>
                                    <td>`+item['inm_latitud']+`</td>
                                    <td>`+item['inm_longitud']+`</td>
                                    <td>`+item['inm_titulo']+`</td>
                                    <td>`+item['inm_precio']+`</td>
                                    <td>`+item['inm_habitaciones']+`</td>
                                  </tr> ` );
      });
      $(".totalData").html(' Total datos: <b>' + resp['total'] + '</b>' );
    }else{
      $(".totalData").html(' No se encontraron registros ' );
    }
  }

  if( $("#filtrarRegistros").length ){
    filtrarData();

    $(document).on("click", ".buscarData", function(){
      filtrarData();
    });
  }

  // Procesar
  function procesarData(){
    var resp = procesarRegistros( $(".form-procesar").serialize() );
    $(".tBodyData").html('');

    if( resp['total'] ){
      resp['data'].forEach(item => {
        $(".tBodyData").append( ` <tr> 
                                    <td>`+item['ID']+`</td>
                                    <td>`+item['inm_latitud']+`</td>
                                    <td>`+item['inm_longitud']+`</td>
                                    <td>`+item['inm_titulo']+`</td>
                                    <td>`+item['inm_precio']+`</td>
                                    <td>`+item['distance']+` km</td>
                                  </tr> ` );
      });
      $(".totalData").html(` Total datos: <b>` + resp[`total`] + `</b><br>
                              El precio promedio es: <b>` + resp['promedio'] + `</b><br><br> `);
    }else{
      $(".totalData").html(' No se encontraron registros ' );
    }
  }

  if( $("#procesarData").length ){
    procesarData();

    $(document).on("click", ".procesarData", function(){
      procesarData();
    });
  }
  
  // Reportes
  function armarTabla(resp2){
    $(".tBodyData").html('');

    if( resp2['files'] ){
         resp2['files'].forEach(item => {
        $(".tBodyData").append( ` <tr> 
                                    <td>`+item+`</td>
                                    <td><a href="reports/`+item+`" target="_blank">Ver</td>
                                  </tr> ` );
      });
    }
  }

  function reportesData(){
    let respRep = loadReportes( $(".form-busqueda").serialize() );
    armarTabla( respRep );
  }

  if( $("#reportesData").length ){
    let respRep = showFiles();
    armarTabla( respRep );

    $(document).on("click", ".buscarData", function(){
      reportesData();
    });
  }

});

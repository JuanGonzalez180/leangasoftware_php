# leangasoftware_php
Prueba PHP

# Archivos importantes
  ```
  -class
    -comercioInmobiliario.php
  ```
  > Clase con todos los métodos
  ```
  -public
    -reports
  ```
  > La carpeta donde quedan guardados todos los reportes
  ```
  -public
    -api
  ```
  > Donde se usan todos los métodos


-Para el punto de Procesar Data, se hace un calculo del radio con la formula MySQL investigada en el siguiente enlace:
  http://www.pabloblanco.es/sql-obtener-coordenadas-en-radio-de-accion/
  
-Se usó la librería dompdf para guardar los reportes.


# Ejercicios

### 1. Importación de data.

__HABILIDADES:__
```
PHP, MYSQL
```
__PROBLEMA:__
> El siguiente [archivo (.csv)](https://gist.github.com/leifermendez/627650290d3edaeb420eef50395da73f) contiene una seria de datos relacionados con el comercio inmobiliario. Ejemplo (Dirección del piso, Metros cuadrados, Características, entre otros)

__REQUERIMIENTO:__
El objetivo principal es crear un método en la clase, al cual se indique la ruta del archivo y esta sea capaz de leer el (.csv) e insertar los valores en una base de datos MySQL.


### 2. Filtrar data.

__HABILIDADES:__
```
PHP, MYSQL
```

__PROBLEMA:__
> Basado en el ejercicio #1 ya tenemos una base de datos funcional. Ahora necesitamos poder filtrar la data.

__REQUERIMIENTO:__
Se requiere un endpoint método GET el cual permita pasar atributos y poder filtrar el resultado de la data por: 
- Rango de precio mínimo y máximo.
-  Número de habitaciones.


### 3. Procesar data.

__HABILIDADES:__
```
PHP, MYSQL
```

__PROBLEMA:__
> En algunos casos necesitamos calcular el precio del alquiler por zona. Para ello necesitamos procesar la información de nuestra base de datos.

__REQUERIMIENTO:__
Se necesita una función en la cual se pasen 3 atributos (Latitud, Longitud, Distancia km), y está retorne el precio promedio del metro cuadrado.

![](https://i.stack.imgur.com/U1c9F.png)


### 4. Reportes data.

__HABILIDADES:__
```
PHP, MYSQL, PDF
```

__PROBLEMA:__
> En ocasiones se necesita generar reportes para el área administrativa, estos reportes deben ser en formato (PDF, CSV)

__REQUERIMIENTO:__
Se requiere un endpoint al cual se pasen los atributos de filtro, coordenadas y tipo de reporte (PDF, CSV) y dicho reporte generado se guarda en una carpeta.


<?php
/*****************************************************************/
/****************  CONEXIÓN BASE DE DATOS  ******************/
/*****************************************************************/

class MySQL{
    //variables de conexion
    private $host = V_HOSTNAME;
    private $user = V_USERNAME;
    private $pass = V_PASSWORD;
    private $db = V_DATABASE;
    public $type = V_TYPE;
    public $lid = 0;
    private $conection;
    
    function __construct( ){}

    function get(){
        $driver = $this->type;
        $host = $this->host;
        $password = $this->pass;
        $username = $this->user;
        $database = $this->db;

        $mysqli = new mysqli($host, $username, $password, $database);
        return $mysqli;
    }

}
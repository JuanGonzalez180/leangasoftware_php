<?php
/*****************************************************************/
/****************  CONEXIÓN BASE DE DATOS  ******************/
/*****************************************************************/

class raConection {
    //variables de conexion
    private $host = V_HOSTNAME;
    private $user = V_USERNAME;
    private $pass = V_PASSWORD;
    private $db = V_DATABASE;
    public $type = V_TYPE;
    public $lid = 0;

    public function __construct($host, $user, $pass, $db, $type){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->type = $type;
    }

    //funcion de conexion
    public function connect(){
        $connect = $this->type.'_connect';
        return $connect($this->host, $this->user, $this->pass, $this->db);
 	}//termina conexion

	//funcion de desconexion
	public function desconnect(){
	 	$desconnect = $this->type.'_close';
		$desconnect($this->lid);
	}//termina funcion de desconexion

}
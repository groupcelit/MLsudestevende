<?php
    ini_set('display_errors', '1');
	const SERVER="celit2017.cuzdoaddgasz.sa-east-1.rds.amazonaws.com";
	const USUARIO="celit2017";
	const CLAVE="Celit_2017";
	const BASE="desarrolloml";

	$link=mysqli_connect(SERVER,USUARIO,CLAVE,BASE);
	mysqli_set_charset($link,"utf8");

/*class Conexion extends PDO {
	private $tipo_de_base = 'mysql';
	private $host = SERVER;
	private $nombre_de_base = BASE;
	private $usuario = USUARIO ;
	private $contrasena = CLAVE;
	
	public function __construct() {
		//Sobreescribo el método constructor de la clase PDO.
		try{
			@parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
		}catch(PDOException $e){
			echo json_encode('Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage());
			exit;
		}
	}
}*/
?>
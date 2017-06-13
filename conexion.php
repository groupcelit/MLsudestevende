<?php
    ini_set('display_errors', '1');
	const SERVER="celit2017.cuzdoaddgasz.sa-east-1.rds.amazonaws.com";
	const USUARIO="celit2017";
	const CLAVE="Celit_2017";
	const BASE="desarrolloml";

	$link=mysqli_connect(SERVER,USUARIO,CLAVE,BASE);
	mysqli_set_charset($link,"utf8");

?>
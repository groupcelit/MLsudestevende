<?php 

$usulogin=$_POST["usu_login"];
$usuclave=$_POST["usu_clave"];
require "conexion.php";
$sql="SELECT usu_nombre FROM usuarios WHERE usu_login='".$usulogin."' AND usu_clave='".$usuclave."'";
$resultado= mysqli_query($link,$sql);
$cantidad= mysqli_num_rows($resultado);
if ($cantidad==0){
	header("location:form-login.php?error=1");
} else {
	//Rutina de autenticación
	session_start(); //Si no está esta directiva no se puede hacer nada
	$_SESSION['login']=1;
	//Redirección a admin
	header("location:bienvenido");
	$fila = mysqli_fetch_assoc($resultado);
	$_SESSION['usu_nombre'] = $fila['usu_nombre'];
}

?>
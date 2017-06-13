<?php

//Recibimos datos imagen
ini_set('display_errors', '1');

$nombreimg=$_FILES['imagen']['name'];
$tipoimg=$_FILES['imagen']['type'];
$pesoimg=$_FILES['imagen']['size'];


//ruta de la carpeta destino
$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/imgpro/';

move_uploaded_file($FILES['imagen']['tmp_name'], $carpetadestino.$nombreimg);



?>
<?php

//Recibimos datos imagen
ini_set('display_errors', '1');

$ruta='imgpro/';
$nombre=$_POST['nombre'];
$archivo=$_FILES['imagen']['tmp_name'];
$nombrearchivo=$_FILES['imagen']['name'];

$subir=move_uploaded_file($archivo, $ruta."/".$nombre);


if ($subir) {
echo "El archivo se subio correctamente";
}
else(echo "El archivo no pudo subirse";);
?>
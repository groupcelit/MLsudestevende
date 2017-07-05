<?php
ini_set('display_errors', '1');
	$titulo = "Subir anuncio en Sudestevende";
	require "conexion.php";

	/*function urls_amigables($url) {
	// Tranformamos a minusculas
		$url = strtolower($url);
	//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
	// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '-', $url);
	// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		return $url;

	}*/

	//Aca comienza la prueba de subida de imagenes

	$prd_nombre=$_POST["prd_nombre"];
	$prd_descripcion=$_POST["prd_descripcion"];
	$prd_precio=$_POST["prd_precio"];
	$estado=$_POST['estado'];
	$stock=$_POST["stock"];
	$sub_cat_id=$_POST["sub_cat_id"];
	$fecha_actual=date("Y-m-d H:i:s");
	$path='nuevo.php';

/*mysqli_query("INSERT INTO anuncios (nombre,descripcion,codigo,precio,descuento,stock,nuevo,destacado,subcategoria_id,creado_en,modificado_en)
 				  VALUES ('".$prd_nombre."','".$prd_descripcion."',null,".$prd_precio.",null,1,1,0,'".$sub_cat_id."','".$fecha_actual."',null)",$con) or die ("pro_insert_db");*/

	$sql="INSERT INTO anuncios VALUES (NULL,1,'".$prd_nombre."','".$prd_descripcion."','nuevo',NULL,'".$prd_precio."',NULL,'".$stock."','".$estado."',0,'".$sub_cat_id."','".$fecha_actual."',NULL,0)";
	/*echo $sql;*/

	mysqli_query($link,$sql) or die(mysqli_error($link));
	$id_anuncio=mysqli_insert_id($link);
	/*echo $id_anuncio;*/
	$chequeo=mysqli_affected_rows($link);//devuelve cantidad de registros afectados
	/*echo $chequeo;*/



	$nombre_publicacion='publicaciones/'.$id_anuncio.'-'.urls_amigables($_POST["prd_nombre"]);
   	/*echo 'Más información de depuración:';*/
	/*print_r($_FILES);*/
	/*	print "</pre>";*/

	/*TODO:Aqui hago la modificacion de los paths/anuncio*Fotos*/
	$sql="UPDATE anuncios
		  SET path='".$nombre_publicacion."'
		  WHERE id ='".$id_anuncio."'";
	mysqli_query($link,$sql) or die(mysqli_error($link));


	/*basename($_FILES['img']['name'])*/
	//$fichero_subido = $dir_subida.basename($_FILES['img']['name']);
//	var_dump($_FILES);
	/*	echo '<pre>';*/
	//move_uploaded_file($_FILES['img']['tmp_name'], $dir_subida)
	foreach ($_FILES['img']['tmp_name'] as $key => $name_files){
		if ($key==0){$principal=1;}else{$principal=0;}

		$sql="INSERT INTO fotos
 		      VALUES (NULL,'nuevo','".$principal."','".$id_anuncio."',null,'".$fecha_actual."',NULL,NULL)";
		mysqli_query($link,$sql) or die(mysqli_error($link));
		$id_foto=mysqli_insert_id($link);
		$nombre_foto='public_images/'.$id_anuncio.$id_foto.'-'.urls_amigables($_POST["prd_nombre"]);

		$sql="UPDATE fotos
		  SET path='".$nombre_foto."'
		  WHERE id ='".$id_foto."'";
		mysqli_query($link,$sql) or die(mysqli_error($link));


		$archivo ='public_images/'.$id_anuncio.$id_foto.'-'.urls_amigables($_POST["prd_nombre"]);
		$dir_subida = '/var/www/html/jlaupa/MLsudestevende/'.$archivo;
		move_uploaded_file($name_files, $dir_subida);
	}
	/*if (move_uploaded_file($_FILES['img']['tmp_name'], $dir_subida)) {*/
		/*echo "El fichero es válido y se subió con éxito.\n";*/
	/*} else {*/
		/*echo "¡Posible ataque de subida de ficheros!\n";*/
	/*}*/


$nombre_archivo=$nombre_publicacion.'.php';
$mensaje = 'exito';
$archivo_a_subir = fopen($nombre_archivo, "a");
$contenido="<?php include 'encabezado.php'; ?>
			</head>
			<body>
				<div id='nav'>
					<?php  include 'menu.php'; ?>
				</div>
			";
fwrite($archivo_a_subir,$contenido);
fclose($archivo_a_subir);
mysqli_close($link);

?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<?php if ($chequeo>0) {?>
			<table id=paneles>
				<tr>
					<th colspan="5">Se ha agregado el siguiente producto</th>
				</tr>
				<tr>
					<td class="lista">Nombre</td>
					<td class="lista"><?php echo $prd_nombre; ?></td>
				</tr>
				<tr>
					<td class="lista">Descripción</td>
					<td class="lista"><?php echo $prd_descripcion; ?></td>
				</tr>
				<tr>
					<td class="lista">Precio</td>
					<td class="lista"><?php echo $prd_precio; ?></td>
				</tr>
				<tr>
					<td class="lista">Miniatura</td>
					<td class="lista"><img src='<?php echo $archivo; ?>'></td>
				</tr>

			</table>


		<?php } ?>

	<!--	<a href="panel-productos.php"> Volver al panel <?php /*$ruta=$_SERVER['REQUEST_URI'];
		echo ($carpetadestino); */?> </a>-->
		
		
		
	</div>
	<?php  include "pie.php"  ?>
	
	
</body>
</html>
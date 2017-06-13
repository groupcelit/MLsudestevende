<?php
	$titulo = "Panel de control - Alta de auto";
	//Rutina para subir imágenes al servidor si fueron enviadas
	$ruta="imagenes/";
	$au_foto1="noDisponible1.png";
	$au_foto2="noDisponible2.png";
	if ($_FILES['au_foto1']['error']==0){
		$au_foto1TMP=$_FILES['au_foto1']['tmp_name'];
		$au_foto1=$_FILES['au_foto1']['name'];
		move_uploaded_file($au_foto1TMP, $ruta.$au_foto1);
	}
	if ($_FILES['au_foto2']['error']==0){
		$au_foto2TMP=$_FILES['au_foto2']['tmp_name'];
		$au_foto2=$_FILES['au_foto2']['name'];
		move_uploaded_file($au_foto2TMP, $ruta.$au_foto2);
	}
	//Rutina para insertar datos en la tabla productos
	$au_modelo=$_POST["au_modelo"];
	$au_descripcion=$_POST["au_descripcion"];
	$au_precio=$_POST["au_precio"];
	$cat_id=$_POST["cat_id"];
	$au_alta=date("Y-m-d");
	require "conexion.php";
	$sql="INSERT INTO PRODUCTOS VALUES (NULL,'".$au_modelo."','".$au_descripcion."',".$au_precio.",".$cat_id.",'".$au_alta."','".$au_foto1."','".$au_foto2."')";
	mysqli_query($link,$sql);
	$chequeo=mysqli_affected_rows($link);//devuelve cantidad de registros afectados
	mysqli_close($link);

?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<div id="top"><!--<img src="imagenes/top.png" alt="encabezado" width="980" height="80">--></div>
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
					<td class="lista"><?php echo $au_modelo; ?></td>
				</tr>
				<tr>
					<td class="lista">Descripción</td>
					<td class="lista"><?php echo $au_descripcion; ?></td>
				</tr>
				<tr>
					<td class="lista">Precio</td>
					<td class="lista"><?php echo $au_precio; ?></td>
				</tr>
				<tr>
					<td class="lista">Miniatura</td>
					<td class="lista"><img src='<?php echo $ruta.$au_foto1; ?>'></td>
				</tr>

			</table>


		<?php } ?>

		<a href="panel-productos.php"> Volver al panel </a>
		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
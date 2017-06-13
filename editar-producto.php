<?php
	require "autenticar.php";
	$titulo = "Panel de control - Modificación de producto";
	//Rutina para subir imágenes al servidor si fueron enviadas
	$ruta="imagenes/";
	$sqlFoto1 = $sqlFoto2 = "";
	if ($_FILES['prd_foto1']['error']==0){
		$prd_foto1TMP=$_FILES['prd_foto1']['tmp_name'];
		$prd_foto1=$_FILES['prd_foto1']['name'];
		move_uploaded_file($prd_foto1TMP, $ruta.$prd_foto1);
		$sqlFoto1 = ", prd_foto1 = '".$prd_foto1."'";
	}
	if ($_FILES['prd_foto2']['error']==0){
		$prd_foto2TMP=$_FILES['prd_foto2']['tmp_name'];
		$prd_foto2=$_FILES['prd_foto2']['name'];
		move_uploaded_file($prd_foto2TMP, $ruta.$prd_foto2);
		$sqlFoto2 = ", prd_foto2 = '".$prd_foto2."'";
	}
	//Rutina para modificar datos en la tabla productos
	$prd_nombre=$_POST["prd_nombre"];
	$prd_descripcion=$_POST["prd_descripcion"];
	$prd_precio=$_POST["prd_precio"];
	$cat_id=$_POST["cat_id"];
	$prd_id=$_POST["prd_id"];
	require "conexion.php";
   $sql = "UPDATE productos
                    SET 
                      prd_nombre = '".$prd_nombre."',
                      prd_descripcion = '".$prd_descripcion."',
                      prd_precio = ".$prd_precio.",
                      cat_id = ".$cat_id;
        $sql = $sql . $sqlFoto1;
        $sql = $sql . $sqlFoto2;
        $sql = $sql . " WHERE prd_id = ".$prd_id;
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
					<th colspan="5">Se ha modificado el siguiente producto</th>
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
					<td class="lista"><img src='<?php echo $ruta.$prd_foto1; ?>'></td>
				</tr>

			</table>


		<?php } 
			else {
				echo "<h3>No se ha modificado el producto <h3>";
				} 
		// Volver al panel de categorias
		?>
				<br>
				<br>
			<div class="centrar">	
				<a href="panel-productos.php"> Volver al panel </a>
			</div>
		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
<?php
ini_set('display_errors', '1');
	$titulo = "Panel de control - Alta de producto";
	//Rutina para subir imágenes al servidor si fueron enviadas
	/*$ruta="imagenes/";
	$prd_foto1="noDisponible1.png";
	$prd_foto2="noDisponible2.png";
	if ($_FILES['prd_foto1']['error']==0){
		$prd_foto1TMP=$_FILES['prd_foto1']['tmp_name'];
		$prd_foto1=$_FILES['prd_foto1']['name'];
		move_uploaded_file($prd_foto1TMP, $ruta.$prd_foto1);
	}
	if ($_FILES['prd_foto2']['error']==0){
		$prd_foto2TMP=$_FILES['prd_foto2']['tmp_name'];
		$prd_foto2=$_FILES['prd_foto2']['name'];
		move_uploaded_file($prd_foto2TMP, $ruta.$prd_foto2);
	}*/
	//Rutina para insertar datos en la tabla productos


	//Aca comienza la prueba de subida de imagenes

	
	
	$nombreimgmin=$_FILES['prd_foto1']['name'];
	$nombreimgamp=$_FILES['prd_foto2']['name'];
	$tipoimgmin=$_FILES['prd_foto1']['type'];
	$tipoimgamp=$_FILES['prd_foto2']['type'];
	$tamanioimgmin=$_FILES['prd_foto1']['size'];
	$tamanioimgamp=$_FILES['prd_foto2']['size'];

	$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/imgpro';

	/*move_uploaded_file($_FILES['prd_foto1']['tmp_name'], $carpetadestino.$nombreimgmin);
	move_uploaded_file($_FILES['prd_foto2']['tmp_name'], $carpetadestino.$nombreimgamp);*/


	

	$prd_foto1=$carpetadestino.$nombreimgmin;
	$prd_foto2=$carpetadestino.$nombreimgamp;














	$prd_nombre=$_POST["prd_nombre"];
	$prd_descripcion=$_POST["prd_descripcion"];
	$prd_precio=$_POST["prd_precio"];
	$cat_id=$_POST["cat_id"];
	$prd_alta=date("Y-m-d");
	

	$host="celit2017.cuzdoaddgasz.sa-east-1.rds.amazonaws.com";
	$user="celit2017";
	$pw="Celit_2017";
	$db="desarrolloml";

	$con = mysqli_connect ($host, $user, $pw)
			or die ("Pro_server");
       
			mysqli_select_db ($con,$db)
			or die ("pro_select_db"); 

	mysqli_query("INSERT INTO productos (prd_id,prd_nombre,prd_descripcion,prd_precio,cat_id,prd_alta,prd_foto1,prd_foto2) VALUES (NULL,'".$prd_nombre."','".$prd_descripcion."',".$prd_precio.",".$cat_id.",'".$prd_alta."','".$prd_foto1."','".$prd_foto2."')",$con) or die ("pro_insert_db");

	
	
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


		<?php } ?>

		<a href="panel-productos.php"> Volver al panel <?php $ruta=$_SERVER['REQUEST_URI'];
echo ($carpetadestino); ?> </a>
		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
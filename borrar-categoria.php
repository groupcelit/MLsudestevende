<?php
	require "autenticar.php";
	$titulo = "Panel de control - Baja de categoría";
	$catid=$_POST["cat_id"];
	require "conexion.php";
	$sql="DELETE FROM categorias WHERE cat_id=".$catid;
	mysqli_query($link,$sql) or die(mysqli_error($link));
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
		<?php if ($chequeo>0){
			echo "<h3> Se ha eliminado categoría correctamente <h3>";
			}  else {
				echo "<h3>No se ha podido eliminar la categoría´ <h3>";
				} 
		// Volver al panel de categorias
				?>
				<br>
				<br>
				
			<a href="panel-categorias.php"> Volver al panel </a>
		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
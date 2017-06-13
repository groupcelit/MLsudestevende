<?php
	require "autenticar.php";
	$titulo = "Panel de control - Alta de categoría";
	require "conexion.php";
	$catnombre=$_POST["cat_nombre"];
	$sql="INSERT INTO categorias VALUES (NULL, '".$catnombre."')";
	mysqli_query($link,$sql) or die(mysqli_error($link));
	$chequeo=mysqli_affected_rows($link);//devuelve cantidad de registros afectados
	mysqli_close($link);

?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<?php if ($chequeo>0){
			echo "<h3> Se ha agregado categoria: <h3>", $catnombre;
			}  else {
				echo "<h3>No se ha podido agregar la categoría: <h3>", $catnombre;
				} 
		// Volver al panel de categorías
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
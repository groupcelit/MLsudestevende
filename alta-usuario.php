<?php	
	require "autenticar.php";
	$titulo = "Panel de control - Alta de usuario";
	require "conexion.php";
	$usulogin=$_POST["usu_login"];
	$usuclave=$_POST["usu_clave"];
	$usunombre=$_POST["usu_nombre"];
	$usuemail=$_POST["usu_email"];
	$sql="INSERT INTO USUARIOS VALUES (NULL, '".$usulogin."','".$usuclave."','".$usunombre."','".$usuemail."')";
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
			echo "<h3> Se ha agregado usuario: <h3>", $usunombre;
			}  else {
				echo "<h3>No se ha podido agregar el usuario: <h3>", $usunombre;
				} 
		// Volver al panel de usuario
				?>
				<br>
				<br>
		
		<a href="panel-usuarios.php"> Volver al panel </a>

		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
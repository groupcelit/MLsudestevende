<?php
	require "autenticar.php";
	$titulo = "Panel de control - Modificación de usuario";
	$usuid=$_POST["usu_id"];
	require "conexion.php";
	$usu_login=$_POST["usu_login"];
	$usu_clave=$_POST["usu_clave"];
	$usu_nombre=$_POST["usu_nombre"];
	$usu_email=$_POST["usu_email"];
	$usu_id=$_POST["usu_id"];
	$sql = "UPDATE usuarios
                    SET 
                      usu_login = '".$usu_login."',
                      usu_clave = '".$usu_clave."',
                      usu_nombre = '".$usu_nombre."',
                      usu_email = '".$usu_email."' WHERE usu_id=".$usu_id;
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
			echo "<h3>Los datos del usuario ",$usu_nombre," Se han modificado correctamente <h3>";
			}  else {
				echo "<h3>No se ha modificado el usuario <h3>";
				} 
		// Volver al panel de usuarios
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
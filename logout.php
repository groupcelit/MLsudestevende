<?php
	$titulo = "Panel de control - Salir del sistema";
	session_start();
	session_unset(); //borra todas las variables de sesión (no la sesión)
	session_destroy(); //borra la sesión
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
		<h2 class="centrar"> Usted ha salido del sistema. Para volver a iniciar sesión seleccione la opción "Ingresar" del menú</h2>
		
		
		
		
	</div>
	<div id="pie">
		<?php include "pie.php"  ?>
	</div>
	
</body>
</html>
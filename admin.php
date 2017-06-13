<?php
	require "autenticar.php";
	$titulo = "Panel de control - Página principal";
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo; ?></h1>
		<!-- inicio del desarrollo -->
		<h2 align="center"><?php echo $_SESSION['usu_nombre']; ?></h2>
		<ul><li><a class="colored" href="panel-productos.php">Admin Productos</a></li>
			<li><a class="colored" href="panel-categorias.php">Admin Categorías</a></li></ul>

		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
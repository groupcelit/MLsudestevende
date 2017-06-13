<?php 	
require "autenticar.php";
$titulo = "Error al borrar categoria";
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
		<h3>No se puede borrar la categoria ya que hay productos existentes de dicha categoria</h3>
		<br>
		<div class="centrar">
			<a href="panel-categorias.php"> Volver al panel </a>
		</div>
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
	
	
</body>
</html>
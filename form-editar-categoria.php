<?php
	require "autenticar.php";
	$titulo = "Formulario de modificación de categoría";
	require "conexion.php";
	$catid=$_GET['cat_id'];
	$sql="SELECT cat_nombre FROM categorias WHERE cat_id=".$catid;
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	$fila=mysqli_fetch_assoc($resultado);
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
		<form action="editar-categoria.php" method="post" enctype="multipart/form-data"> <!-- enctype para poder enviar las imagenes -->
			<table id="paneles">
				<tr>
					<th>Categoría</th>
					<td class="lista"><input type="text" name="cat_nombre" value='<?php echo $fila['cat_nombre'] ?>'></td>

				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="hidden" name="cat_id" value='<?php echo $catid ?>' >
						<input type="submit" value="Modificar categoria">
					</td>
				</tr> 									
			</table>
		</form>
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
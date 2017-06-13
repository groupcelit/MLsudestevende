<?php
	require "autenticar.php";
	$titulo = "Panel de control - Categorías";
	require "conexion.php";
	$sql="SELECT cat_id, cat_nombre FROM categorias";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	$cantidad=mysqli_num_rows($resultado); //cuenta la cantidad de registros
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
		<table id="paneles">
			<tr>
				<th> ID </th>
				<th> Categoría </th>
				<th colspan="2"> <a href="form-alta-categoria.php"> <img src=<?php echo "imgs/add.png" ?> </a> </th> 
			</tr>
			<?php while($fila=mysqli_fetch_assoc($resultado)) { ?>
			<tr>
				<td class="lista"> <?php echo $fila['cat_id'] ?> </td>
				<td class="lista"> <?php echo $fila['cat_nombre'] ?> </td>
				<td class="lista"> <a href="form-editar-categoria.php?cat_id=<?php echo $fila['cat_id']?>"><img src=<?php echo "imgs/editar3.png" ?> </a></td>
				<td class="lista"> <a href="verificarIntegridadCat.php?cat_id=<?php echo $fila['cat_id']?>"><img src=<?php echo "imgs/borrar.png" ?> </a></td>

			</tr>
			<?php } ?>
			<tr>
				<td colspan="4" class="pie">
					Se han encontrado <?php echo " ", $cantidad, " " ?> registros
				</td>
			</tr>
		</table>
		
		
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
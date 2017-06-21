<?php
	require "autenticar.php";
	$titulo = "Panel de control - Panel productos";
	require "conexion.php";
	$sql="SELECT id, nombre, descripcion, precio FROM anuncios";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	$cantidad=mysqli_num_rows($resultado); //cuenta la cantidad de registros
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<!--<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<table id="panel">
			<tr>
				<th> Nombre </th>
				<th> Descripción </th>
				<th> Precio </th>
				<th> Imagen </th>
				<th colspan="2"> <a href="form-alta-producto.php?"> <img src=<?php echo "imgs/add.png" ?> </a></th> 
			</tr>
			<?php while($fila=mysqli_fetch_assoc($resultado)) { ?>
			<tr>
				<td class="lista"> <?php echo $fila['nombre'] ?> </td>
				<td class="lista"> <?php echo $fila['descripcion'] ?> </td>
				<td class="lista"> <?php echo $fila['precio'] ?> </td>
				<td class="lista"> <!-- <img src='<?php /*echo "imagenes/",$fila['prd_foto1']*/ ?>'> --></td>
				<td class="lista"> <a href="form-editar-producto.php?id=<?php echo $fila['id']?>"><img src=<?php echo "imgs/editar3.png" ?> </a> </td>
				<td class="lista"> <a href="form-borrar-producto.php?id=<?php echo $fila['id']?>"><img src=<?php echo "imgs/borrar.png"  ?> </a> </td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="6" class="pie">
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
<?php
	require "autenticar.php";
	$titulo = "Formulario de modificación de producto";
	require "conexion.php";
	$prdid=$_GET['prd_id'];
	$sql="SELECT cat_id, cat_nombre FROM categorias";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));

	$sql2="SELECT prd_nombre, prd_descripcion, prd_precio, cat_id, prd_foto1 FROM productos WHERE prd_id=".$prdid;
	$resultado2=mysqli_query($link,$sql2) or die(mysqli_error($link));
	$fila2=mysqli_fetch_assoc($resultado2);
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
		<form action="editar-producto.php" method="post" enctype="multipart/form-data"> <!-- enctype para poder enviar las imagenes -->
			<table id="paneles">
				<tr>
					<th>Nombre</th>
					<td class="lista"><input type="text" name="prd_nombre" value='<?php echo $fila2['prd_nombre'] ?>'></td>

				</tr>
				<tr>
					<th>Descripcion</th>
					<td class="lista"><textarea name="prd_descripcion"><?php echo $fila2['prd_descripcion'] ?></textarea></td>

				</tr>				
				<tr>
					<th>Precio</th>
					<td class="lista"><input type="text" name="prd_precio" value='<?php echo $fila2['prd_precio'] ?>'></td>

				</tr>			
				<tr>
					<th>Categoria</th>
					<td class="lista">
						<select name="cat_id">
									<?php while($fila=mysqli_fetch_assoc($resultado)) { ?>
										<option value="<?php echo $fila["cat_id"] ?>" <?php if ($fila["cat_id"] == $fila2["cat_id"]) echo "selected" ?>><?php echo $fila["cat_nombre"]?></option>		
									<?php } ?>	

						</select>
					</td>						
				</tr>
				<tr>
					<th>Imagen</th>
					<td class="lista"> <img src='imagenes/<?php echo $fila2['prd_foto1']; ?>'> </td> <!--type="file" es el boton para subir archivos--> 
				</tr>	
				<tr>
					<th>Imagen miniatura</th>
					<td><input type="file" name="prd_foto1"></td> <!--type="file" es el boton para subir archivos--> 
				</tr>	
				<tr>
					<th>Imagen ampliada</th>
					<td><input type="file" name="prd_foto2"></td> <!--type="file" es el boton para subir archivos--> 
				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="hidden" name="prd_id" value='<?php echo $prdid ?>' >
						<input type="submit" value="Modificar producto">
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
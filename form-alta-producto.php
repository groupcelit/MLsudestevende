<?php
	require "autenticar.php";
	$titulo = "Formulario de alta de nuevo producto";
	require "conexion.php";
	$sql="SELECT cat_id, cat_nombre FROM categorias";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	mysqli_close($link);
?>
<?php include "encabezado.php"; ?>
</head>
<body>
<!--	<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>
-->	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<form action="alta-producto.php" method="post" enctype="multipart/form-data"> <!-- enctype para poder enviar las imagenes -->
			<table id="paneles">
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="prd_nombre"></td>
				</tr>
				<tr>
					<td>Descripcion</td>
					<td><textarea name="prd_descripcion" rows="6"></textarea></td>
				</tr>				
				<tr>
					<td>Precio</td>
					<td><input type="text" name="prd_precio"></td>
				</tr>			
				<tr>
					<td>Categoria</td>
					<td>
						<select name="cat_id">
									<?php while($fila=mysqli_fetch_assoc($resultado)) { ?>
										<option value="<?php echo $fila["cat_id"] ?>"> <?php echo $fila["cat_nombre"]?> </option>		
									<?php } ?>	

						</select>
					</td>						
				</tr>
				<tr>
					<td>Imagen miniatura</td>
					<td><input type="file" name="prd_foto1"></td> <!--type="file" es el boton para subir archivos--> 
				</tr>	
				<tr>
					<td>Imagen ampliada</td>
					<td><input type="file" name="prd_foto2"></td> <!--type="file" es el boton para subir archivos--> 
				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="submit" value="Agregar producto">
					</td>
				</tr> 									
			</table>
		</form>
	</div>
	<?php  include "pie.php"  ?>
</body>
</html>
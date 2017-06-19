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
		<?php  include "views/aside.php"; ?>
		<!-- inicio del desarrollo -->
		<section id="shop" class="results grid">
			<div class="col-md-12 clear-main">
				<div class="form white-bg b-shadow">
					<form action="alta-producto.php" method="post" enctype="multipart/form-data" class="form-horizontal form">
					<div class="form-group">
						<label for="estado" class="control-label col-sm-2">Estado </label>
						<div class="btn-group col-sm-8" data-toggle="buttons">
							<label class="btn btn-primary active">
								<input type="radio" name="options" id="estado" autocomplete="off" checked> Nuevo
							</label>
							<label class="btn btn-primary">
								<input type="radio" name="options" id="estado" autocomplete="off"> Usado
							</label>
						</div>
					</div>

					<div class="form-group">
						<label for="nombre_id" class="control-label col-sm-2">Nombre</label>
						<div class="col-sm-8"> <!-- This is a new div -->
							<input type="text" class="form-control" id="prducto_id" name="prd_nombre" placeholder=" Esto es una prueba ">
						</div>
					</div>

					<div class="form-group"> <!-- Full Name -->
						<label for="price" class="control-label col-sm-2">Precio</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="price" name="prd_precio" placeholder="$ 500">
						</div>
					</div>

					<div class="form-group"> <!-- Full Name -->
						<label for="categoria" class="control-label col-sm-2">Categoria</label>
						<div class="col-sm-8">
							<select class="form-control" name="cat_id">
							<?php while($fila=mysqli_fetch_assoc($resultado)) { ?>
								<option value="<?php echo $fila["cat_id"] ?>"> <?php echo $fila["cat_nombre"]?> </option>
							<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group"> <!-- Full Name -->
						<label for="descripcion" class="control-label col-sm-2">Descripcion</label>
						<div class="col-sm-8">
							<textarea type="text" class="form-control" id="descripcion_id" name="prd_descripcion" placeholder=" Es una heladera muy grande" rows="5"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2"> <!--New div, offset because there is no label -->
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</form>
				</div>
			</div>
		</section>
	</div>
	<?php  include "pie.php"  ?>
</body>
</html>
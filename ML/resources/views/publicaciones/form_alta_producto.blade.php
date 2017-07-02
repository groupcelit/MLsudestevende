<?php
	require "autenticar.php";
?>
@include ("encabezado")
</head>
<body>
<!--	<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>
-->	<div id="nav">
		@include ("menu")
	</div>
	<div id="main">
		@include ("menu.aside")
		<!-- inicio del desarrollo -->
		<section id="shop" class="results grid">
			<div class="col-md-12 clear-main">
				<div class="form white-bg b-shadow">
					<form id="alta_anuncio_form" method="post" enctype="multipart/form-data" class="form-horizontal form ">
						<div class="form-group">
							<div class="col-md-12 no-padding">
								<label for="estado" class="control-label col-sm-2">Estado </label>
								<div class="btn-group col-sm-4" data-toggle="buttons">
									<label for="estado" class="btn btn-primary active">
										<input type="radio" name="estado" id="estado1" value="1" autocomplete="off" checked> Nuevo
									</label>
									<label for="estado" class="btn btn-primary">
										<input  type="radio" name="estado" id="estado0" value="0" autocomplete="off"> Usado
									</label>
								</div>

								<label for="estado" class="control-label col-sm-2">Stock </label>
								<div class="col-sm-2" data-toggle="buttons">
										<input class="form-control" type="number" name="stock" id="stock" autocomplete="off"  value="1">
								</div>

							</div>
						</div>

						<div class="form-group">
							<label for="nombre_id" class="control-label col-sm-2">Nombre</label>
							<div class="col-sm-8"> <!-- This is a new div -->
								<input type="text" class="form-control" id="prducto_id" name="prd_nombre" placeholder=" Ford fuego 2000 300km">
							</div>
						</div>

						<div class="form-group"> <!-- Full Name -->
							<label for="price" class="control-label col-sm-2">Precio</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="price" name="prd_precio" placeholder=" 500">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="categoria" class="control-label col-sm-2">Categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="cat_id">
								<?php foreach ($categorias as $categoria){ ?>
									<option value="<?=$categoria->id?>"> <?=$categoria->nombre?> </option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="subcategoria" class="control-label col-sm-2">Sub categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="sub_cat_id">
								<?php foreach($sub_categorias as $sub_categoria) { ?>
									  <option value="<?=$sub_categoria->id?>"> <?=$sub_categoria->nombre?> </option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="control-label col-sm-2">Descripcion</label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" id="descripcion_id" name="prd_descripcion" placeholder=" Es una heladera muy grande" rows="5"></textarea>
							</div>
						</div>

						<div id="update_imagenes" class="form-group">
							<label for="fotos" class="control-label col-sm-2">Imagenes</label>
							<div class="col-sm-8">
								<input type="file" name="img[]" class="file">
								<div class="input-group col-xs-12 ">
									<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
									<input type="text" class="form-control" disabled placeholder="Seleccione la imagen principal">
									  <span class="input-group-btn">
										<button class="browse btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i> Buscar</button>
									  	<button class="btn btn-success add_image" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
									  </span>

								</div>

							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2"> <!--New div, offset because there is no label -->
								<button onclick="anuncio.enviar()" type="button" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	@include ("pie")
	<script>
		var anuncio = anuncio || (function () {
					var parametros = {};

					return {

						enviar:function () {
							/*disparemos eventos*/
							anuncio.valid();
						},

						valid: function () {
							/*aqui hacemos las validaciones*/
							anuncio.logeo();
						},

						logeo: function () {
							var data = $("#alta_anuncio_form").serializeObject();
							alert(data);
							$.ajax({
								data : data,
								url : 'usuarios/login',
								type : 'POST',
								contentType : 'application/x-www-form-urlencoded',
								beforeSend: function() {
									console.log('cargando');
								},
								success: function(response) {
									if (response.exito) {
										window.location.replace('bienvenido')
									} else {
										alert("crea una cuenta :3");
									}

								}
							});

						}

					}
				}());
		var login_form = $("#alta_anuncio_form");
		//checks whether the pressed key is "Enter"
		login_form.bind("keydown",function(e){ if (e.keyCode === 13) {anuncio.enviar()}});
	</script>
</body>
</html>
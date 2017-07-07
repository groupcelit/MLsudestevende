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
					<form id="alta_anuncio_form" method="post" enctype="multipart/form-data" class="form-horizontal form" action="anuncios/new_anuncio" >
						<div class="form-group">
							<div class="col-md-12 no-padding">
								<label for="estado" class="control-label col-sm-2">Estado </label>
								<div class="btn-group col-sm-4" data-toggle="buttons">
									<label for="estado" class="btn btn-primary active">
										<input type="radio" name="nuevo" id="estado1" value="1" autocomplete="off" checked> Nuevo
									</label>
									<label for="estado" class="btn btn-primary">
										<input  type="radio" name="nuevo" id="estado0" value="0" autocomplete="off"> Usado
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
								<input type="text" class="form-control"  name="nombre" placeholder=" Ford fuego 2000 300km">
							</div>
						</div>

						<div class="form-group"> <!-- Full Name -->
							<label for="price" class="control-label col-sm-2">Precio</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="price" name="precio" placeholder=" 500">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="categoria" class="control-label col-sm-2">Categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="categoria_id">
								<?php foreach ($categorias as $categoria){ ?>
									<option value="<?=$categoria->id?>"> <?=$categoria->nombre?> </option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="subcategoria" class="control-label col-sm-2">Sub categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="subcategoria_id">
								<?php foreach($sub_categorias as $sub_categoria) { ?>
									  <option value="<?=$sub_categoria->id?>"><?=$sub_categoria->nombre?> </option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="control-label col-sm-2">Descripcion</label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" name="descripcion" placeholder=" Es una heladera muy grande" rows="5"></textarea>
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
								<button type="submit" class="btn btn-primary">Guardar</button>
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
						inicializarAlta: function() {
											$('[name=categoria_id]').bind('change',
													function(){
														$.ajax({
															data : data,
															url : 'anuncios/new_anuncio',
															type : 'POST',
															contentType : 'application/x-www-form-urlencoded',
															beforeSend: function() {
																console.log('cargando');
															},
															success: function(response) {
																if (response.exito) {
																	console.log('exito')
																} else {
																	alert("crea una cuenta :3");
																}

															}
														});
													}
											);
						},
						enviar:function () {
							/*disparemos eventos*/
							anuncio.valid();
						},

						valid: function () {
							/*aqui hacemos las validaciones*/
							anuncio.logeo();
						},

						logeo: function () {
							/*var datos = $("#alta_anuncio_form").serializeObject();
							var data={};*/
							var data = new FormData();
							var input = $('.files');
							//Append files infos
							$.each(input[0].files, function(i, file) {
								data.append('file-'+i, file);
							});
							console.log(data);
							$.ajax({
								data : data,
								url : 'anuncios/new_anuncio',
								type : 'POST',
								contentType : 'application/x-www-form-urlencoded',
								beforeSend: function() {
									console.log('cargando');
								},
								success: function(response) {
									if (response.exito) {
										console.log('exito')
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


		/*$(document).ready(inicializarEventosInstitucionForm);

		function inicializarEventosInstitucionForm() {

			activeAccordion();
			activeAC();
			activeButtons();

			$('#form_save').attr("href", "#");
			$("#form_save").click(function(){
				if($("#form-institucion-datos-basicos").valid()){
					if (validarFormDireccion()) {
						saveInstitucion();
					}
				}
				else{
					notify('Por favor, verifique lo datos requeridos', 'error');
				};

			});

			$("#institucion-tabs").tabs();
		}

		function saveInstitucion(){
			var es_dependencia
					=   $("input[type=checkbox][name=dependencia]").is(":checked")?1:0;
			/!*var datos = $("#form-institucion-datos-basicos").serialize() + '&' + $("#dir_form").serialize();
			 var url = base_url + 'admin/institucion_form/saveInstitucion';
			 proccess_via_ajax_and_continue(url, datos, reloadFormInstitucion, notifyProcessing );*!/
			datos=formAObjeto($("#dir_form"));
			datos.es_dependencia=es_dependencia;
			var options = {
				data: datos
				,   success: function (datosServer) {
					reloadFormInstitucion(datosServer);
				}
			};

			var url = base_url + 'admin/institucion_form/saveInstitucion';

			$("form#form-institucion-datos-basicos").attr("action",url);
			$("form#form-institucion-datos-basicos").ajaxSubmit(options);
		}
		*/
	</script>
</body>
</html>
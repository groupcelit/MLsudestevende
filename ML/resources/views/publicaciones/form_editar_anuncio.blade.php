@include ("encabezado")
</head>
<body>
<!--	<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>
-->	<div id="nav">
		@include ("menu")
	</div>
	<div id="main">
		@include ("menu.aside_usuario")
		<!-- inicio del desarrollo -->
		<section id="shop" class="results grid">
			<div class="col-md-12 clear-main">
				<div class="form white-bg b-shadow">				
					<form id="alta_anuncio_form" method="PUT" enctype="multipart/form-data" class="form-horizontal form" >
						<div class="form-group">
							<div class="col-md-12 no-padding">
								<label for="estado" class="control-label col-sm-2">Estado </label>
								<div class="btn-group col-sm-4" data-toggle="buttons">
									<label for="estado" class="btn btn-primary <?php if($anuncio['info']->nuevo == 1){?>active<? } ?>">
										<input type="radio" name="nuevo" id="estado1" value="1" autocomplete="off" <?php if($anuncio['info']->nuevo == 1) {?> checked <?php } ?>> Nuevo
									</label>
									<label for="estado" class="btn btn-primary <?php if($anuncio['info']->nuevo == 0){?>active<? } ?>">
										<input  type="radio" name="nuevo" id="estado0" value="0" autocomplete="off" <?php if($anuncio['info']->nuevo == 0) {?> checked <?php } ?>> Usado
									</label>
								</div>

								<label for="estado" class="control-label col-sm-2">Stock </label>
								<div class="col-sm-2" data-toggle="buttons">
										<input class="form-control" type="number" name="stock" id="stock" autocomplete="off"  value="<?=$anuncio['info']->stock?>">
								</div>

							</div>
						</div>

						<div class="form-group">
							<label for="nombre_id" class="control-label col-sm-2">Nombre</label>
							<div class="col-sm-8"> <!-- This is a new div -->
								<input type="text" class="form-control"  name="nombre" placeholder=" Ford fuego 2000 300km" value="<?=$anuncio['info']->nombre?>">
							</div>
						</div>

						<div class="form-group"> <!-- Full Name -->
							<label for="price" class="control-label col-sm-2">Precio</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="price" name="precio" placeholder=" 500"
									value="<?=$anuncio['info']->precio?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="categoria" class="control-label col-sm-2">Categoria</label>
							<div class="col-sm-8">
								<select onchange="anuncio.getSubCategorias()" class="form-control" name="categoria_id">
								<?php foreach ($categorias as $categoria){
									$selected='';
									if($anuncio['info']->categoria == $categoria->id){$selected="selected='selected'";}
									?>
									<option value="<?=$categoria->id?>" <?=$selected?>> <?=$categoria->nombre?> </option>
								<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="subcategoria" class="control-label col-sm-2">Sub categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="subcategoria_id">
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="control-label col-sm-2">Descripcion</label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" name="descripcion" placeholder=" Es una heladera muy grande" rows="5"><?=$anuncio['info']->descripcion?></textarea>
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

						<div id="msg" class=" hidden" role="alert" align="center">

						</div>

						<div  id="save" class="form-group" >
							<div class="col-sm-8 col-sm-offset-2"> <!--New div, offset because there is no label -->
								<button  type="button" onclick="anuncio.enviar()" class="btn btn-primary">Guardar</button>
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
					var click = false;
					return {

						enviar:function () {

							if(anuncio.valid() && !click){
								click=true;
								anuncio.save();
							}
						},

						valid: function () {
								if($('[type=file]')[0].files[0] != undefined) {
									$.each($('[type=file]'), function (e, file) {
										/*2mb*/
										if (file.files[0].size > 2000000) {
											$('#msg').removeClass();
											$('#msg').addClass('alert alert-warning');
											$('#msg').html('Esta imagen pesa mas de 2mb :C ' + file.files[0].name);
											$('#msg').focus();
											return false;
										}
									});
								}else{
									$('#msg').removeClass();
									$('#msg').addClass('alert alert-danger');
									$('#msg').html('Elige una imagen principal te ayudara a vender');
									$('#msg').focus();

									return false;
								}

						return true;
						},

						save: function () {
							var datos = $("#alta_anuncio_form").serializeObject();
							datos.anuncio_id = <?=$anuncio['info']->id?>;
							var options = {
								data: datos,
								type : 'PUT',
								beforeSend: function (){
											console.log('enviado datos');
								},
							    success: function (response) {
									console.log(response);
									click=false;
									$('#msg').removeClass();
									$('#msg').addClass('alert alert-success');
									$('#msg').html('Gracias por publicar');
									$('#msg').focus();
									$('#save').remove();
								}
							};
							var url = '/anuncios/edit_anuncio';
							$("#alta_anuncio_form").attr("action",url);
							$("#alta_anuncio_form").ajaxSubmit(options);

						},

						getSubCategorias: function(){
							data=$('[name=categoria_id]').serializeObject();
								$.ajax({
									data :data,
									url : '/subcategorias/getSubCategorias',
									type : 'POST',
									success: function(response) {
										$('[name=subcategoria_id] option').remove();
										$.each(response,function(e,data){
											var selected='';
											if (data.id == <?=$anuncio['info']->subcategoria?>){selected="selected='selected'"}
											$('[name=subcategoria_id]').append('<option value='+data.id+' '+selected+'>'+data.nombre+'</option>');
										})
									}
								})
						}
					}
				}());

		$(window).load(function(){
			var login_form = $("#alta_anuncio_form");
			//checks whether the pressed key is "Enter"
			login_form.bind("keydown",function(e){ if (e.keyCode === 13) {anuncio.enviar()}});
			anuncio.getSubCategorias();
		});
	</script>
</body>
</html>
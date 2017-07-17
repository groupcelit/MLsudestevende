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
					<form id="alta_anuncio_form" method="post" enctype="multipart/form-data" class="form-horizontal form" >
						<div class="form-group">
							<div class="col-md-12 no-padding">
								<label for="estado" class="control-label col-sm-3">Estado </label>
								<div class="btn-group col-sm-4" data-toggle="buttons">
									<label for="estado" class="btn btn-primary <?php if($anuncio['info']->nuevo == 1){?> active <?php } ?>">
										<input type="radio" name="nuevo" id="estado1" value="1" autocomplete="off" <?php if($anuncio['info']->nuevo == 1) {?> checked <?php } ?>> Nuevo
									</label>
									<label for="estado" class="btn btn-primary <?php if($anuncio['info']->nuevo == 0){?> active <?php } ?>">
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
							<label for="nombre_id" class="control-label col-sm-3">Nombre</label>
							<div class="col-sm-8"> <!-- This is a new div -->
								<input type="text" class="form-control"  name="nombre" placeholder=" Ford fuego 2000 300km" value="<?=$anuncio['info']->nombre?>">
							</div>
						</div>

						<div class="form-group"> <!-- Full Name -->
							<label for="price" class="control-label col-sm-3">Precio</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="number" class="form-control" id="price" name="precio" placeholder=" 500"
									value="<?=$anuncio['info']->precio?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="categoria" class="control-label col-sm-3">Categoria</label>
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
							<label for="subcategoria" class="control-label col-sm-3">Sub categoria</label>
							<div class="col-sm-8">
								<select class="form-control" name="subcategoria_id">
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion" class="control-label col-sm-3">Descripcion</label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" name="descripcion" placeholder=" Es una heladera muy grande" rows="5"><?=$anuncio['info']->descripcion?></textarea>
							</div>
						</div>

						<div id="update_imagenes" class="form-group">
							<div class="col-md-12">
								<label for="fotos" class="control-label col-sm-3">Imagenes</label>
								<?php
								foreach ($anuncio['foto'] as $key => $foto){
								$principal='';
								if($key<>0){$class="col-sm-8 col-sm-offset-3";}else{$class="col-sm-8";}
								if($foto->principal){$principal="principal";}
								?>
								<div class="<?=$class?>">
									<div class="img-wrap">
										<span class="close">&times;</span>
										<img class="<?=$principal?>" src="/<?=$foto->path?>" data-id="<?=$foto->id?>" data-delete="0">
									</div>

								</div>
								<?php } ?>
							</div>
							<div class="col-md-12">
								<label for="fotos" class="control-label col-sm-3">Agregar Imagenes</label>
								<div class="col-sm-8">
									<input type="file" name="img[]" class="file">
									<div class="input-group col-xs-12 ">
										<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
										<input type="text" class="form-control" disabled placeholder="Añadir otra imagen">
									  <span class="input-group-btn">
										<button class="browse btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i> Buscar</button>
									  	<button class="btn btn-success add_image" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
									  </span>

									</div>
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
					var fotos_id_delete = [];
					$('.img-wrap .close').on('click', function() {
					    var id = $(this).closest('.img-wrap').find('img').data('id');
					    fotos_id_delete.push(id);
					    $(this).closest('.img-wrap').remove();
					});
					return {

						enviar:function () {

							if(anuncio.valid() && !click){
								click=true;
								anuncio.save();
							}
						},

						valid: function () {
								if($('[type=file]')[0].files[0] != undefined || $('.principal').attr('data-id') != undefined) {
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
									}
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
							datos.fotos_delete =JSON.stringify(fotos_id_delete);

							console.log(datos);

							var options = {
								data: datos,
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
									type: 'POST',
									success: function(response) {
										$('[name=subcategoria_id] option').remove();
										$.each(response,function(e,data){
											var selected='';
											if (data.id == <?=$anuncio['info']->subcategoria ?>){selected="selected='selected'"}
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
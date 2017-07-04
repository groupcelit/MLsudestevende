@include('encabezado')
<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	    /* display: none; <- Crashes Chrome on hover */
	    -webkit-appearance: none;
	    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
	}	
</style>
</head>
<body>
	<!-- <div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div> -->
	<div id="nav">
		@include('menu')
	</div>
	<section class="home container"></section>
	
	<div  id="main">
		@include('menu.aside_usuario')
		
		<section id="shop" class="results grid">
			<div class="clear-main">
				<h1>Editar Perfil</h1>
				<div class="form white-bg b-shadow">
					<form class="form edit form-horizontal" id="edit-user-form">
						<div class="form-group">
							<label for="persona_nombres" class="col-sm-10">Nombres</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input id="persona_nombres" name="persona_nombres" type="text" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_apellidos" class="col-sm-10">Apellidos</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input id="persona_apellidos" name="persona_apellidos" type="text" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_fecha_nacimiento" class="col-sm-10">Fecha de Nacimiento</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
									<input id="persona_fecha_nacimiento" name="persona_fecha_nacimiento" type="date" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_direccion" class="col-sm-10">Direccion</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
									<input id="persona_direccion" name="persona_direccion" type="text" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_email" class="col-sm-10">Email</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input id="persona_email" name="persona_email" type="email" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_celular_codigo" class="col-sm-12">Telefono</label>
							<div class="col-sm-3">
								<div class="input-group">
									<span class="input-group-addon">0</span>
									<input id="persona_celular_codigo" name="persona_celular_codigo" maxlength="5" type="number" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon">15</span>
									<input id="persona_celular" name="persona_celular" type="number" class="form-control" required value="">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						
						<!-- <div class="form-group">
							<label class="control-label" for="cityinput">Localidad</label>
						    <div class="row">
								<div class="col-md-8">
									<input name="domicilio-input" type="text" class="form-control" value="">
								</div>
							</div>
						</div> -->
						<div class="col-xs-12">
							<button type="button" id=save name="edit-user-submit" onclick="usuarios.guardar(this,<?=$_SESSION['key']?>)" style="float: right" class="btn btn-info">Guardar</button>
							<div class="loading"></div>
						</div>
						
					</form>
				</div>
				<h2>Cambiar Contraseña</h2>
				<div class="form white-bg b-shadow">
					<form id="edit-password-form" class="form edit form-horizontal" >
						<div class="form-group">
							<label for="passinput" class="col-sm-10">Nueva Contraseña</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input  id="usuario_password" name="usuario_password" type="password" class="form-control">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="passverifyinput" class="col-sm-10">Confirmar Nueva Contraseña</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" id="passverifyinput">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="col-xs-12">
							<button type="button" style="float: right" class="btn btn-info" onclick="usuarios.guardar(this,<?=$_SESSION['key']?>)">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	
	@include('pie')

	<script type="text/javascript" src="assets/js/usuarios.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			var persona = usuarios.updateUser(<?=$_SESSION['key']?>);
		});
	</script>

?>
<body>
<html>
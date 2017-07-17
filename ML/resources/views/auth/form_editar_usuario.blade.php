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
				<h1>Mi Cuenta</h1>
				<div class="form white-bg b-shadow">
					<form class="form edit form-horizontal" id="edit-user-form">
						<div class="form-group">
							<label for="persona_nombres" class="col-sm-10">Nombres</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input id="persona_nombres" name="persona_nombres" type="text" class="form-control" required value="<?=$person_data->nombres?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_apellidos" class="col-sm-10">Apellidos</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
									<input id="persona_apellidos" name="persona_apellidos" type="text" class="form-control" required value="<?=$person_data->apellidos?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_fecha_nacimiento" class="col-sm-10">Fecha de Nacimiento</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
									<input id="persona_fecha_nacimiento" name="persona_fecha_nacimiento" type="date" class="form-control" required value="<?=$person_data->fecha_nacimiento?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_direccion" class="col-sm-10">Direccion</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
									<input id="persona_direccion" name="persona_direccion" type="text" class="form-control" required value="<?=$person_data->direccion?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_email" class="col-sm-10">Email</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input id="persona_email" name="persona_email" type="email" class="form-control" required value="<?=$person_data->email?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="persona_celular_codigo" class="col-sm-12">Telefono</label>
							<div class="col-sm-3">
								<div class="input-group">
									<span class="input-group-addon">0</span>
									<input id="persona_celular_codigo" name="persona_celular_codigo" maxlength="5" type="number" class="form-control" required value="<?=$person_data->celular_codigo?>">
								</div>
								<div class="error_msg"></div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon">15</span>
									<input id="persona_celular" name="persona_celular" type="number" class="form-control" required value="<?=$person_data->celular?>">
								</div>
								<div class="error_msg"></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
								<button type="button" name="edit-user-submit" onclick="usuarios.guardar(this)" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>
				<h2>Cambiar Contraseña</h2>
				<div class="form white-bg b-shadow">
					<form id="edit-password-form" class="form edit form-horizontal" >
						<div class="form-group">
							<label for="usuario_password" class="col-sm-10">Nueva Contraseña</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input  id="usuario_password_id" name="usuario_password" type="password" class="form-control" required>
								</div>
								<div class="error_msg_password"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="usuario_password_confirm" class="col-sm-10">Confirmar Nueva Contraseña</label>
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="usuario_password_confirm" id="usuario_password_confirm" required>
								</div>
								<div class="error_msg_password"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<button type="button" class="btn btn-primary" onclick="usuarios.guardar(this)">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	
	@include('pie')

	<script type="text/javascript" src="/assets/js/forms/login/usuarios.js"></script>
</body>
<html>
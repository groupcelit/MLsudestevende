@include('encabezado')
</head>
<body>
	<div id="nav">
		@include('menu')
	</div>
	<div id="main">
		@include('menu.aside')
		<section  id="shop" class="results grid">
			<div class="main-login main-center clear-main">
				<div class="form white-bg b-shadow">
					<div class="form login">
						<h5 class="t-center">Ingresa en Sudestevende</h5>
						<form id="login_usuario_form" class="form-horizontal" method="post">
							<div class="form-group">
								<label for="name" class="col-sm-10">Usuario</label>
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="usuario_username" id="user"  placeholder="Ingresa tu usuario"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-sm-10">Contraseña</label>
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control" name="usuario_password" id="clave"  placeholder="Ingresa tu contraseña"/>
									</div>
								</div>
							</div>

							<div class="form-group ">
								<input onclick="usuario.enviar()" id="enviar" type="button" class="btn btn-primary btn-lg btn-block login-button" value="Ingresar">
							</div>
						</form>
						<?php
						if (isset($_GET["error"])) {
							$error=$_GET["error"];
							if ($error==1){ ?>
								<div id="error">  Usuario y/o clave incorrectos </div>
							<?php } else if ($error==2) { ?>
								<div id="error">  Debe loguearse al sistema</div>
							<?php }
						} ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	@include('pie')
	<script>
		var usuario = usuario || (function () {
					var parametros = {};

					return {

						enviar:function () {
						/*disparemos eventos*/
							usuario.valid();
						},

						valid: function () {
						/*aqui hacemos las validaciones*/
							usuario.logeo();
						},

						logeo: function () {
								var data = $("#login_usuario_form").serializeObject();
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
		var wage = $("#login_usuario_form");
		//checks whether the pressed key is "Enter"
		wage.bind("keydown",function(e){ if (e.keyCode === 13) {usuario.enviar()}});
	</script>
</body>
</html>
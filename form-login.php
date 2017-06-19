<?php
	$titulo = "Login";
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<?php  include "views/aside.php"; ?>
		<section  id="shop" class="results grid">
			<div class="main-login main-center clear-main">
				<div class="form white-bg b-shadow">
					<div class="form login">
						<h5 class="t-center">Ingresa en Sudestevende</h5>
						<form class="form-horizontal" action="login.php" method="post">
							<div class="form-group">
								<label for="name" class="col-sm-10">Usuario</label>
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
										<input type="text" class="form-control" name="usu_login" id="user"  placeholder="Ingresa tu usuario"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-sm-10">Contraseña</label>
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<input type="password" class="form-control" name="usu_clave" id="clave"  placeholder="Ingresa tu contraseña"/>
									</div>
								</div>
							</div>

							<div class="form-group ">
								<input class="btn btn-primary btn-lg btn-block login-button" type="submit" value="Ingresar">
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


	<!--<div id="main">
		<h1><?php /*echo $titulo ; */?></h1>-->
		<!-- inicio del desarrollo -->
		<!--<form action="login.php" method="post">
			<table id="paneles">
				<tr>
					<td>Usuario:</td>
					<td><input type="text" name="usu_login"></td>
				</tr>
				<tr>
					<td>Clave:</td>
					<td><input type="password" name="usu_clave"></td>
				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="submit" value="Enviar">
					</td>
				</tr> 
			</table>	
		</form>-->


	<!--</div>-->

	<?php  include "pie.php"  ?>

	
</body>
</html>
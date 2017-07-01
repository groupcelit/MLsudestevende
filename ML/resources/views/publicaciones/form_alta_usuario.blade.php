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
                        <h5 class="t-center">Crea un nuevo usuario en Sudestevende</h5>
                        <form class="form-horizontal" action="alta-usuario.php" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-10">Nombre</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="usu_nombre" id="nombre"  placeholder="Cual es tu nombre?"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-10">Email</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="usu_email" id="email"  placeholder="Cual es tu email?"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-10">Nombre Usuario</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="usu_login" id="user"  placeholder="Nombre de usuario"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-10">Contraseña</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="usu_clave" id="clave"  placeholder="Ingresa una Contraseña"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="col-sm-10">Confirmar contraseña</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="usu_clave_confirm" id="confirm_clave"  placeholder="Confirma tu Contraseña"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <input class="btn btn-primary btn-lg btn-block login-button" type="submit" value="Agregar usuario">
                            </div>
                        </form>
                    </div>
                </div>
		    </div>
        </section>
	</div>
		<!-- inicio del desarrollo -->
		<!--<form action="alta-usuario.php" method="post">
			<table id="paneles">
				<tr>
					<td>Usuario<td>
					<td><input type="text" name="usu_login"><td>
				<tr>
				<tr>
					<td>Clave<td>
					<td><input type="password" name="usu_clave"><td>
				<tr>
				<tr>
					<td>Nombre<td>
					<td><input type="text" name="usu_nombre"><td>
				<tr>
				<tr>
					<td>Email<td>
					<td><input type="text" name="usu_email"><td>
				<tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="submit" value="Agregar usuario">
					<td>
				<tr>
			</table>
		</form>-->
    @include('pie')
</body>
</html>



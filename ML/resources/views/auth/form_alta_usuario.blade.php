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
                        <form id="create-user-form" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="name" class="col-sm-10">Nombres</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="persona_nombres" id="persona_nombres"  placeholder="Cual es tu nombre?"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-10">Apellidos</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="persona_apellidos" id="persona_apellidos"  placeholder="Cual es tu apellido?"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-10">Nombre Usuario</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="usuario_username" id="usuario_username"  placeholder="Nombre de usuario"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-10">Email</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="persona_email" id="persona_email"  placeholder="Cual es tu email?"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="persona_fecha_nacimiento" class="col-sm-10">Fecha de Nacimiento</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
                                        <input id="persona_fecha_nacimiento" name="persona_fecha_nacimiento" type="date" class="form-control" required>
                                    </div>
                                    <div class="error_msg"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="persona_direccion" class="col-sm-10">Dirección</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i></span>
                                        <input id="persona_direccion" name="persona_direccion" type="text" class="form-control" required placeholder="Cual es tu dirección?">
                                    </div>
                                    <div class="error_msg"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="persona_celular_codigo" class="col-sm-12">Telefono</label>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">0</span>
                                        <input id="persona_celular_codigo" name="persona_celular_codigo" maxlength="5" type="number" class="form-control" required>
                                    </div>
                                    <div class="error_msg"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">15</span>
                                        <input id="persona_celular" name="persona_celular" type="number" class="form-control" required >
                                    </div>
                                    <div class="error_msg"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usuario_password" class="col-sm-10">Contraseña</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="usuario_password" id="usuario_password_id"  placeholder="Ingresa una Contraseña"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usuario_password_confirm" class="col-sm-10">Confirmar contraseña</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="usuario_password_confirm" id="usuario_password_confirm"  placeholder="Confirma tu Contraseña"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <input id="save" class="btn btn-primary btn-lg btn-block login-button" type="button" value="Registrar" onclick="usuarios.guardar(this)">
                            </div>
                        </form>
                    </div>
                </div>
		    </div>
        </section>
	</div>
    @include('pie')
    <script type="text/javascript" src="/assets/js/forms/login/usuarios.js"></script>

</body>
</html>



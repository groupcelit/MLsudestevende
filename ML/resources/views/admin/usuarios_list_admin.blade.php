@include('encabezado')
</head>
<body>
	<div id="nav">
        @include('menu')
	</div>
	<div id="main">
		@include('menu.aside')
		<section  id="usuarios" class="results grid">
            <div class="main-login main-center clear-main">
            	<div class="container">
            		<h1>Usuarios</h1>
            		<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
						<input type="text" onkeyup="usuarios_admin.filtrarLista()" class="form-control" id="usuario_search" name="usuario_search" placeholder="Buscar por nombre de usuario">
					</div>
            		<ul class="list" id="listaUser">
            			<?php foreach($usuarios_data as $usuario) {?>
            			<li>
            				<div class="panel-body container">
            					<div class="col-sm-1">
            						<i class="fa fa-user" aria-hidden="true"></i>
            					</div>
            					<div class="col-sm-3 username">
									<div class="item_details t-left">
											<?=$usuario->username?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="item_details t-left">
											<?=$usuario->email?>
									</div>
								</div>
								<div class="col-sm-2">
									<form class="form-horizontal">
										<div class="form-group no-margin">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="usuario_premium" id="<?=$usuario->id?>" autocomplete="off" <?php if($usuario->premium==1) {?> checked
													<?php } ?> > Premium
												</label>
											</div>
										</div>
									</form>
								</div>
								<div class="col-sm-3">
									<button type="button" class="pull-right colored" onclick="usuarios_admin.borradoadmin(<?=$usuario->id?>)">
										<i class="fa fa-times" aria-hidden="true"></i>	
									</button>
            					</div>
            				</div>
            			</li>
            			<?php } ?>
            		</ul>
            	</div>
            </div>
        </section>
    </div>
    @include('pie')
    <script type="text/javascript" src="assets/js/usuarios_admin.js"></script>
</body>
</html>
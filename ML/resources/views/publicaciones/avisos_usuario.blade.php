<?php
	require "autenticar.php";
	require "conexion.php";
?>
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
	<div  id="main">
		@include('menu.aside_usuario')
		<section id="shop" class="results grid">
			<div class="clear-main">
				<!-- <div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="info">
								<td>Codigo</td>
								<td>Nombre</td>
								<td>Subcategoria</td>
								<td>Stock</td>
								<td>Precio</td>
							</tr>
						</thead>
						<tbody>
							<tr class="clickable-row" data-href="producto_view.php">
								<td>213213</td>
								<td>Mcintosh</td>
								<td>Celular</td>
								<td>32</td>
								<td>1600</td>
							</tr>
							<tr class="clickable-row" data-href="producto_view.php">
								<td>212311</td>
								<td>Nintendo Switch</td>
								<td>Consola/Videojuegos</td>
								<td>10</td>
								<td>6100</td>
							</tr>
						</tbody>
					</table>	
				</div> -->
				<div class="container">
					<h1>Mis Anuncios</h1>
					<p>Haga click en el anuncio deseado para ver mas detalles</p>
					<div class="panel-group">
						<div class="panel panel-info">
							<div class="panel-heading padding-0" style="height: 35px">
								<a class="col-md-12" data-toggle="collapse" href="#anuncio1">
									<div class="col-md-12">
										<div class="col-md-4">
											<h4 class="panel-title black">Nintendo Switch</h4>
										</div>
										<div class="col-md-offset-7 col-md-1">
											<i class="fa fa-plus" align="right" aria-hidden="true"></i>
										</div>
									</div>
									
								</a>
							</div>
							<div id="anuncio1" class="panel-collapse collapse">
								<div>aca pasan cosas</div>
							</div>
						</div>
					</div>
				</div>
				

			</div>
		</section>
	</div>
	
	@include('pie')

	
<body>
<html>
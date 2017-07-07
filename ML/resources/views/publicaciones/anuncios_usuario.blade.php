@include('encabezado')
<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	    /* display: none; <- Crashes Chrome on hover */
	    -webkit-appearance: none;
	    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
	}
	.panel-heading a:hover {
		color: black;
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
				<div class="container">
					<h1>Mis Anuncios</h1>
					<p>Haga click en el anuncio deseado para ver mas detalles</p>
					<?php foreach($anuncios as $anuncio) {?>
					<div class="panel-group">
						<div class="panel panel-info">
							<div class="panel-heading padding-0" role="tab" style="height: 35px" id="headingOne">
								<a class="col-md-12 colored" data-toggle="collapse" href="#<?=$anuncio->id?>">
									<div class="col-md-4">
										<h4 class="panel-title"><?=$anuncio->nombre?></h4>
									</div>
									<div class="col-md-offset-7 col-md-1">
										<i class="fa fa-plus" align="right" aria-hidden="true"></i>
									</div>
								</a>
							</div>
							<div id="<?=$anuncio->id?>" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body container">
									<div class="col-md-12 white-bg">
										<div class="col-md-3 search-results">
											<div class="item-image item item--grid">
												<div class="item__image">
													<img src="/public_images/iphone.png" alt="Sin imagen">
												</div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="item_details t-left">
												<div class="price "><h3 class="text-left text-danger">$ <?=$anuncio->precio?></h3></div>
												<div class="shop_item_header "><p><?=$anuncio->descripcion?></p></div>
												<!--<div class="shop_item_description"><?php /*/*echo substr($fila['prd_descripcion'],0,40).'...'; */?></--div>-->
											</div>
										</div>
										<div class="col-md-4">
											<div class="item_details t-left">
												<div class="price "><h3 class="text-left text-info">Stock: <?=$anuncio->stock?></h3></div>
												<button class="btn btn-primary"><h4 class="bold text-left">Ir a la pagina del producto</h4></button>
												<!--<div class="shop_item_description"><?php /*/*echo substr($fila['prd_descripcion'],0,40).'...'; */?></--div>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
				
		</section>
		</div>
		
	</div>
	
	@include('pie')

	
<body>
<html>
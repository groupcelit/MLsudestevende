
@include('encabezado')

</head>
<body>
	<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		@include('menu')
	</div>
	<section class="home container"></section>
	<div  id="main">
		@include('menu.aside')
		<section id="shop" class="results grid">
			<ol class="box section search-results grid">
				<?php foreach($anuncios as $anuncio) {?>

				<li class="results-item grid">
					<a href="<?=$anuncio->path_anuncio?>">
						<div class="item-image item item--grid">
							<div class="item__image">
								<?php /*/*echo "imagenes/",$fila['prd_foto1'];*/ ?>
								<img src="<?=$anuncio->path_foto?>" alt="iphone"></div>

							<div class="item_details t-center">
								<div class="price ">$ <?=$anuncio->precio?></div>
								<div class="shop_item_header "><?=$anuncio->nombre?></div>
								<!--<div class="shop_item_description"><?php /*/*echo substr($fila['prd_descripcion'],0,40).'...'; */?></--div>-->
							</div>
						</div>
					</a>
				</li>
				<?php } ?>
			</ol>
		</section>	
	</div>
	@include('pie')
</body>
</html>
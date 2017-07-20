
@include('encabezado')
</head>
<body>
	<div id="nav">
		@include('menu')
	</div>
	<section class="home container"></section>
	<div id="main">
		@include('menu.aside')
		<section id="shop" class="results grid">
			<ol class="box section search-results grid f-left">
				<?php 
					if (empty($anuncios[0])) { ?>
						
					<ul class="nav">
						<div class="logo f-left item-image">
						    <i class="fa fa-search fa-5x" aria-hidden="true"></i>
						</div>
						<h2><p class="bg-warning">No hay publicaciones que coincidan con tu búsqueda.</p></h2>
						<ul class="nav">
						    <li><p class="bg-warning">Revisa la ortografía de la palabra.</p></li>
						    <li><p class="bg-warning">Utiliza palabras más genéricas o menos palabras.</p></li>
						    <li><p class="bg-warning">Navega por categorías de productos para encontrar un producto similar.</p></li>
						</ul>
					</ul>

				<?php } ?>
				<?php
					$inicio=0;
					foreach($anuncios as $anuncio) {
				?>
				<li class="results-item grid animated" data-animation="fadeIn" data-animation-delay="<?=$inicio?>">
					<a href="/<?=$anuncio->path_anuncio?>">
						<div class="item-image item item--grid">
							<div class="item__image">
								<?php /*/*echo "imagenes/",$fila['prd_foto1'];*/ ?>
								<img src="/<?=$anuncio->path_foto?>" alt="iphone"></div>

							<div class="item_details t-center">
								<div class="price ">$ <?=$anuncio->precio?></div>
								<div class="shop_item_header "><?=$anuncio->nombre?></div>
								<!--<div class="shop_item_description"><?php /*/*echo substr($fila['prd_descripcion'],0,40).'...'; */?></--div>-->
							</div>
						</div>
					</a>
				</li>
				<?php
					$inicio=$inicio+50;
					} ?>
			</ol>
			<nav align="center" aria-label="Paginado">
				<?=$anuncios->links();?>
			</nav>
		</section>	
	</div>
	@include('pie')
<script>

</script>
</body>
</html>
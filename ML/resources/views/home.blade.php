<?php
	$titulo = "Panel de control - Proyecto integrador";
	require "autenticar.php";
	/*require "conexion.php";*/
	/*$sql="SELECT a.nombre, a.descripcion, a.precio ,f.path as path_image , a.path as path_publicaciones
		  FROM anuncios AS a
		  INNER JOIN fotos AS f on a.id=f.anuncio_id
		  WHERE f.principal = 1";
	$resultado =mysqli_query($link,$sql) or die(mysqli_error($link));
	$cantidad  =mysqli_num_rows($resultado);*/ //cuenta la cantidad de registros
	
?>

@include('encabezado')
</head>
<body>
	<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		@include('menu')
	</div>
	<section class="home container"></section>
	<div  id="main">

		<!--<h1><?php /*echo $titulo ; */?></h1>-->
		<!-- inicio del desarrollo -->
			<?php
			echo '<pre>';
			var_dump($anuncios[0]);
			echo '</pre>';
			?>

		<?php  include "views/aside.php"; ?>
		<section id="shop" class="results grid">
			<ol class="box section search-results grid">
				<?php foreach($anuncios as $anuncio) {?>

				<li class="results-item grid">
					<a href="<?=$anuncio->path?>">
						<div class="item-image item item--grid">
							<div class="item__image">
								<?php /*/*echo "imagenes/",$fila['prd_foto1'];*/ ?>
								<img src="<?php /*echo $fila['path_image']*/?>" alt="iphone"></div>

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
<?php
	$titulo = "Panel de control - Proyecto integrador";
	require "autenticar.php";
	require "conexion.php";
	$sql="SELECT prd_nombre, prd_descripcion, prd_precio, prd_foto1 FROM productos";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	$cantidad=mysqli_num_rows($resultado); //cuenta la cantidad de registros
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<!--<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>-->
	<div id="nav">
		<?php include "menu.php"; ?>
	</div>
	<section class="home container"></section>
	<div  id="main">
		<!--<h1><?php /*echo $titulo ; */?></h1>-->
		<!-- inicio del desarrollo -->

		<?php  include "views/aside.php"; ?>
		<section id="shop" class="results grid">
			<ol class="box section search-results grid">
				<?php while($fila=mysqli_fetch_assoc($resultado)) { /*$cantidad*/?>

				<li class="results-item grid">
					<a href="#">
						<div class="item-image item item--grid">
							<div class="item__image">
								<?php /*echo "imagenes/",$fila['prd_foto1'];*/ ?>
								<img src="images/medio.png" alt="iphone"></div>

							<div class="item_details t-center">
								<div class="price ">$ <?php echo $fila['prd_precio']; ?></div>
								<div class="shop_item_header "><?php echo $fila['prd_nombre']; ?></div>
								<!--div class="shop_item_description"><?php /*echo substr($fila['prd_descripcion'],0,40).'...'; */?></div>-->
							</div>
						</div>
					</a>
				</li>
				<?php } ?>
			</ol>
		</section>
	</div>

	<?php  include "pie.php"  ?>
	
</body>
</html>
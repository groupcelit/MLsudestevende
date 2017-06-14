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

		<aside class="filters grid" role="complementary">
			<div class="sidebar-offcanvas hidden-print white-bg" id="sidebar" role="navigation">
				<div class="sidebar-nav">
					<h3>VEHÍCULOS</h3>
					<ul class="nav">
						<li><a href="/4x4"><i class=" fa fa-car"></i> 4X4</a></li>
						<li><a href="/accesorios-del-automotor"><i class=" fa fa-life-ring"></i> Accesorios del automotor</a></li>
						<li><a href="/automoviles"><i class="fa fcar"></i> Automóviles</a></li>
						<li><a href="/camionetas"><i class=" fa fa-bus"></i> Camionetas</a></li>
						<li><a href="/grandes-transportes"><i class=" fa fa-truck"></i> Grandes transportes</a></li>
						<li><a href="/motos-y-cuatriciclos"><i class="fa fa-motorcycle"></i> Motos y Cuatriciclos</a></li>
						<li><a href="/nautica"><i class="fa fa-ship"></i> Náutica</a></li>
					</ul>
					<h3>INMUEBLES</h3>
					<ul class="nav">
						<li><a href="/campos-y-terrenos"><i class="fa fa-area-chart "></i> Campos y Terrenos</a></li>
						<li><a href="/casas"><i class="fa fa-home"></i> Casas</a></li>
						<li><a href="/departamentos"><i class="fa fa-building "></i> Departamentos</a></li>
						<li><a href="/fondos-de-comercio"><i class="fa fa-key"></i> Fondos de Comercio</a></li>
						<li><a href="/locales-galpones-cocheras"><i class="fa fa-hlome"></i> Locales / Galpones / Cocheras</a></li>
						<li><a href="/quintas"><i class="fa fa-lhome"></i> Quintas</a></li>
					</ul>
					<h3>TECNOLOGÍA</h3>
					<ul class="nav">
						<li><a href="/audio-y-video"><i class="fa fa-video-camera"></i> Audio y Video</a></li>
						<li><a href="/fotografia"><i class="fa fa-camera"></i> Fotografía</a></li>
						<li><a href="/informatica"><i class="fa fa-laptop"></i> Informática</a></li>
						<li><a href="/telefonia"><i class="fa fa-mobile"></i> Telefonía</a></li>
					</ul>
					<h3>VARIOS</h3>
					<ul class="nav">
						<li><a href="/agropecuarios"><i class="icon-rubro-agropecuario-1"></i> Agropecuarios</a></li>
						<li><a href="/amoblamientos"><i class=" fa fa-bed"></i> Amoblamientos</a></li>
						<li><a href="/animacion-de-fiestas"><i class="fa fa-birthday-cake"></i> Animación de Fiestas</a></li>
						<li><a href="/antigueedades"><i class="icon-rubro-antiguedades"></i> Antigüedades</a></li>
						<li><a href="/compras-ventas-varias"><i class="fa fa-shopping-bag "></i> Compras / Ventas Varias</a></li>
						<li><a href="/construccion"><i class="icon-rubro-construccion"></i> Construcción</a></li>
						<li><a href="/cursos-ensenanzas"><i class="fa-graduation-cap"></i> Cursos / Enseñanzas</a></li>
						<li><a href="/deportes"><i class="fa fa-futbol-o "></i> Deportes</a></li>
						<li><a href="/empleos"><i class="fa fa-briefcase"></i> Empleos</a></li>
						<li><a href="/equipamientos-para-negocios"><i class="icon-rubro-mobiliario-negocios"></i> Equipamientos para negocios</a></li>
						<li><a href="/gastronomia-y-eventos"><i class="fa fa-cutlery "></i> Gastronomía y Eventos</a></li>
						<li><a href="/indumentaria"><i class="icon-rubro-indumentaria"></i> Indumentaria</a></li>
						<li><a href="/instrumentos-musicales"><i class="icon-rubro-instrumentos-musicales"></i> Instrumentos Musicales</a></li>
						<li><a href="/maquinas-y-herramientas"><i class="fa fa-wrench"></i> Máquinas y Herramientas</a></li>
						<li><a href="/mascotas-y-plantas"><i class="fa fa-paw"></i> Mascotas y Plantas</a></li>
						<li><a href="/profesionales"><i class="icon-rubro-profesionales"></i> Profesionales</a></li>
						<li><a href="/salud-belleza"><i class="fa fa-heart"></i> Salud / Belleza</a></li>
						<li><a href="/servicios-varios"><i class="fa fa-fax "></i> Servicios Varios</a></li>
						<li><a href="/solidaridad-donaciones"><i class=" fa fa-american-sign-language-interpreting "></i> Solidaridad / Donaciones</a></li>
						<li><a href="/turismo"><i class="fa fa-tree "></i> Turismo</a></li>
					</ul>
				</div><!--/.well -->
			</div>
		</aside>
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
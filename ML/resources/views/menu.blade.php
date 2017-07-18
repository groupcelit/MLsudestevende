<?php if (isset($_SESSION['login'])&&$_SESSION['keyword']=="admin_celit") {
	?>
	<ul class="white-bg">

		<!--<li><a class="colored" href="form-visitas.php">Libro de visitas</a></li>-->
		<li><a class="colored" href="/admin/usuarios">Usuarios</a></li>
		<li><a class="colored" href="/admin/anuncios">Anuncios</a></li>
		<!-- <li><a class="colored" href="buscador.php">Búsqueda</a></li> -->
		<!-- <li><a class="colored" href="form-contacto.php">Contacto</a></li>-->

	</ul>
	<?php
}
?>
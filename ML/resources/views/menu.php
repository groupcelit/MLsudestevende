<?php if (isset($_SESSION['login'])&&$_SESSION['keyword']=="admin_celit") {
	?>
	<ul>
		<!-- <li><a class="colored" href="admin.php">Administracion</a></li> -->
		<!--<li><a class="colored" href="form-visitas.php">Libro de visitas</a></li>-->
		<li><a class="colored" href="/admin_usuarios">Admin Usuarios</a></li>
		<!-- <li><a class="colored" href="buscador.php">Búsqueda</a></li> -->
		<!-- <li><a class="colored" href="form-contacto.php">Contacto</a></li>-->

	</ul>
	<?php
}
?>
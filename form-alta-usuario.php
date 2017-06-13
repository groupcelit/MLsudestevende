<?php
	require "autenticar.php";
	$titulo = "Formulario de alta de nuevo usuario";
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<div id="top"><!--<img src="imagenes/top.png" alt="encabezado" width="980" height="80">--><div>
	<div id="nav">
		<?php  include "menu.php"; ?>
	<div>
	<div id="main">
		<h1><?php echo $titulo ; ?><h1>
		<!-- inicio del desarrollo -->
		<form action="alta-usuario.php" method="post">
			<table id="paneles">
				<tr>
					<td>Usuario<td>
					<td><input type="text" name="usu_login"><td>
				<tr>
				<tr>
					<td>Clave<td>
					<td><input type="password" name="usu_clave"><td>
				<tr>
				<tr>
					<td>Nombre<td>
					<td><input type="text" name="usu_nombre"><td>
				<tr>
				<tr>
					<td>Email<td>
					<td><input type="text" name="usu_email"><td>
				<tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="submit" value="Agregar usuario">
					<td>
				<tr> 									
			<table>
		<form>
	<div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	<div>
	
<body>
<html>
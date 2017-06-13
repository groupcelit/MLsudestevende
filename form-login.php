<?php
	$titulo = "Login";
?>
<?php include "encabezado.php"; ?>
</head>
<body>
	<div id="top"><!--<img src="imagenes/top.png" alt="encabezado" width="980" height="80">--></div>
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<form action="login.php" method="post">
			<table id="paneles">
				<tr>
					<td>Usuario:</td>
					<td><input type="text" name="usu_login"></td>
				</tr>
				<tr>
					<td>Clave:</td>
					<td><input type="password" name="usu_clave"></td>
				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="submit" value="Enviar">
					</td>
				</tr> 
			</table>	
		</form>
		<?php 
		if (isset($_GET["error"])) {
		$error=$_GET["error"];
			if ($error==1){ ?>
				<div id="error">  Usuario y/o clave incorrectos </div>
		<?php } else if ($error==2) { ?>
				<div id="error">  Debe loguearse al sistema</div>
				<?php }
				} ?>
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
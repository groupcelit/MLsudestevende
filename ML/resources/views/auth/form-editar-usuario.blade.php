<?php
	require "autenticar.php";
	$titulo = "Formulario de modificación de usuario";
?>
@include('encabezado')
</head>
<body>
	<div id="top"><!--<img src="imagenes/top.png" alt="encabezado" width="980" height="80">--></div>
	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<form action="editar-usuario.php" method="post">
			<table id="paneles">
				<tr>
					<th>Usuario</th>
					<td class="lista"><input type="text" name="usu_login" value='<?php echo $fila['usu_login'] ?>'></td>
					
				</tr>
				<tr>
					<th>Clave</th>
					<td class="lista"><input type="password" name="usu_clave" value='<?php echo $fila['usu_clave'] ?>'></td>

				</tr>				
				<tr>
					<th>Nombre</th>
					<td class="lista"><input type="text" name="usu_nombre" value='<?php echo $fila['usu_nombre'] ?>'></td>

				</tr>			
				<tr>
					<th>Email</th>
					<td class="lista"><input type="text" name="usu_email" value='<?php echo $fila['usu_email'] ?>'></td>
			
				</tr>
				<tr>
					<td colspan="2" class="centrar">
						<input type="hidden" name="usu_id" value='<?php echo $usuid ?>' >
						<input type="submit" value="Modificar usuario">
					</td>
				</tr> 									
			</table>
		</form>
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
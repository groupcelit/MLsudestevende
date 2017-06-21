<?php
	require "autenticar.php";
	$titulo = "Formulario de baja de producto";
	require "conexion.php";
        $anun_id=$_GET['id'];
   	$sql="SELECT nombre, descripcion, precio FROM anuncios WHERE id=".$anun_id;
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	$fila=mysqli_fetch_assoc($resultado);
	mysqli_close($link);
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
		<form action="borrar-producto.php" method="post" onsubmit="return confirmarBajaProducto()"> <!-- enctype para poder enviar las imagenes -->
			<table id="paneles">
				<tr>
					<th>Nombre</th>
					<td class="lista"><input type="text" name="prd_nombre" value='<?php echo $fila['nombre'] ?>'></td>
				</tr>
				<tr>
					<th>Descripcion</th>
					<td class="lista"><input type="text" name="prd_nombre" value='<?php echo $fila['descripcion'] ?>'></td>
				</tr>				
				<tr>
					<th>Precio</th>
					<td class="lista"><input type="text" name="prd_nombre" value='<?php echo $fila['precio'] ?>'></td>
				</tr>			
				
				<tr>
					<th>Imagen</th>
					<!-- <td class="lista"> <img src='imagenes/<?php /*echo $fila['prd_foto1'];*/ ?>'> </td>  --><!--type="file" es el boton para subir archivos--> 
				</tr>	
				<tr>
					<td colspan="2" class="centrar">
						<input type="hidden" name="prd_id" value='<?php echo $anun_id ?>' >
						<input type="submit" value="Confirmar baja">
					</td>
				</tr> 									
			</table>
		</form>
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
	<script type="text/javascript" src="funciones.js">
	</script>
</body>
</html>

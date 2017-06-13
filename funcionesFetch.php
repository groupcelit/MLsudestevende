<?php 
		require "conexion.php";
		$sql = "SELECT prd_nombre, prd_descripcion, prd_precio, prd_foto1 FROM productos";

		$resultado = mysqli_query ($link, $sql)
			or die(mysqli_error($link));


		//$fila = mysqli_fetch_array($resultado);
		//$fila = mysqli_fetch_row($resultado);  // ordenado por número
		$fila = mysqli_fetch_assoc($resultado);  // ordenado por nombre del campo

?>
<pre>
	<?php print_r($fila) ?>
</pre>
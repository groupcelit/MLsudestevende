<?php
	$titulo = "Panel de control - Alta usuarios";

    require "conexion.php";

    $usu_login=$_POST['usu_login'];
    $usu_clave=$_POST['usu_clave'];
    $usu_nombre=$_POST['usu_nombre'];
    $usu_email=$_POST['usu_email'];

    $sql = "INSERT INTO usuarios
            VALUES
            (NULL, 
            '".$usu_login."',
            '".$usu_clave."',
            '".$usu_nombre."',
            '".$usu_email."'
            )";


	mysqli_query($link, $sql) or die(mysqli_error($link));

	$chequeo = mysqli_affected_rows($link);

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
		
		<?php 

			if ($chequeo == 0){

		?>
		    <table id="paneles">
		        <tr>
   			 	<td><h3>el alta fue incorrecta</h3></td>
   			 	</tr>
            </table>
   		<?php 

   			} else{		
   		?>		

            <table id="paneles">
              <tr> 
              	<td><h3>Se ha agregado el siguiente usuario</h3></td>
              </tr>
            </table>


            <table id="paneles">

            	<tr>
              		<th>Login</th>
              		<th>Clave</th>
              		<th>Nombre</th>
              		<th>Email</th>
            	</tr>

   				<tr> 
   					<td><center> <?php echo $usu_login;?>  </center></td>
   					<td><center> <?php echo $usu_clave;?>  </center></td>
   					<td><center> <?php echo $usu_nombre;?> </center></td>
					<td><center> <?php echo $usu_email;?>  </center></td>
				</tr>

   			</table>

   		<?php	
            }
   		?>
		<h3><a href="panel-usuarios.php">Volver a Usuarios</a></h3>
		
	</div>
	<div id="pie">
		<?php  include "pie.php"  ?>
	</div>
	
</body>
</html>
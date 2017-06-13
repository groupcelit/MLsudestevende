<?php
        $archivo = $_FILES['archivo'];
?>
<pre>
       <?php  print_r($archivo); ?>
</pre>
<?php
    $ruta = "fotos/";
    if($_FILES['archivo']['error']==0){
        $nombreArchivo = $_FILES['archivo']['name'];
        $ubicacionTemporal = $_FILES['archivo']['tmp_name'];
        move_uploaded_file($ubicacionTemporal, $ruta.$nombreArchivo);
    }
?>


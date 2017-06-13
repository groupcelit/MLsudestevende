<?php
    ### CÓDIGO ORIGINAL
 ?>

<select name="cat_id">
 <?php while ($fila=mysqli_fetch_assoc($resultado)){ ?>
     <option value="<?php echo $fila['cat_id']; ?>"><?php echo $fila['cat_nombre']; ?></option>
 <?php } ?>
</select>


<?php
### solucion usando if/else
?>

<select name="cat_id">
 <?php while ($fila=mysqli_fetch_assoc($resultado)){
    if($fila['cat_id']==$fila2['cat_id']) {
 ?>
     <option selected value="<?php echo $fila['cat_id']; ?>"><?php echo $fila['cat_nombre']; ?></option>
 <?php
    } else {
 ?>
     <option value="<?php echo $fila['cat_id']; ?>"><?php echo $fila['cat_nombre']; ?></option>
 <?php
    }
   }
 ?>
</select>



<?php
### CÓDIGO ORIGINAL
?>

<select name="cat_id">
 <?php while ($fila=mysqli_fetch_assoc($resultado)){ ?>
  <option <?php  if($fila['cat_id']==$fila2['cat_id']) { echo 'selected'; }?> value="<?php echo $fila['cat_id']; ?>"><?php echo $fila['cat_nombre']; ?></option>
 <?php } ?>
</select>

  
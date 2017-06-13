function confirmarBajaProducto(){
	var mensaje='Si pulsa el botón "Aceptar" se eliminará el producto';
	if (confirm(mensaje)){
		return true;
	}
	//redirección
	window.location="panel-productos.php";
	return false;

}

function confirmarBajaUsuario(){
	var mensaje='Si pulsa el botón "Aceptar" se eliminará el usuario';
	if (confirm(mensaje)){
		return true;
	}
	//redirección
	window.location="panel-usuarios.php";
	return false;

}

function confirmarBajaCategoria(){
	var mensaje='Si pulsa el botón "Aceptar" se eliminará la categoria';
	if (confirm(mensaje)){
		return true;
	}
	//redirección
	window.location="panel-categorias.php";
	return false;

}
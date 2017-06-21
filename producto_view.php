<?php
	require "conexion.php";
	$sql="SELECT prd_nombre, prd_descripcion, prd_precio, prd_foto1 FROM anuncios";
	$resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
	mysqli_close($link);
?>
<?php include "encabezado.php"; ?>
<style type="text/css">
	.carousel-product-img {
		height: 325px !important;
		width: 100%;
		max-width: none !important;
	}

	.item img {
	    -webkit-transition: all 1s ease; /* Safari and Chrome */
	    -moz-transition: all 1s ease; /* Firefox */
	    -ms-transition: all 1s ease; /* IE 9 */
	    -o-transition: all 1s ease; /* Opera */
	    transition: all 1s ease;
	}

	.item:hover img {
	    -webkit-transform:scale(1.25); /* Safari and Chrome */
	    -moz-transform:scale(1.25); /* Firefox */
	    -ms-transform:scale(1.25); /* IE 9 */
	    -o-transform:scale(1.25); /* Opera */
	     transform:scale(1.25);
	}

	p {
		word-wrap: break-word;
	}
</style>
</head>
<body>
<!--	<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>
-->	<div id="nav">
		<?php  include "menu.php"; ?>
	</div>
	<div id="main" class="">

		<?php  include "views/aside.php"; ?>
		<!-- inicio del desarrollo -->
		<section id="shop" class="results grid">
			<div class="row col-md-12 white-bg form b-shadow">
				<div class="col-md-12">
                	<h1 class="text text-left">Macintosh 1987</h1>
                </div>
				<div class="col-md-6">
					<div id="carousel-product-view" class="carousel slide" data-ride="carousel">
						
						<div class="carousel-inner" role="listbox">
							<div class="item active">
							  <img class="carousel-product-img" src="images/bg-01.jpg" alt="...">
							  <div class="carousel-caption">
							    
							  </div>
							</div>
							<div class="item">
							  <img class="carousel-product-img" src="images/bg_about.jpg" alt="...">
							  <div class="carousel-caption">
							    
							  </div>
							</div>
							<div class="item">
							  <img class="carousel-product-img" src="images/background22.jpg" alt="...">
							  <div class="carousel-caption">
							    
							  </div>
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-product-view" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-product-view" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="row">
                        <div class="col-xs-4 col-sm-2">
                            <a name="thumbnail" href="#" class="img-thumbnail thumb"><img src="images/bg-01.jpg" alt="...">
								<i class="icon-zoomin hide"></i>
							</a>
                        </div>
						<div class="col-xs-4 col-sm-2">
							<a name="thumbnail" href="#" class="img-thumbnail thumb"><img src="images/bg_about.jpg" alt="...">
								<i class="icon-zoomin hide"></i>
							</a>
	                    </div>
	                    <div class="col-xs-4 col-sm-2">
	                    	<a onclick="mover(this)" name="thumbnail" href="#" class="img-thumbnail thumb"><img src="images/background22.jpg" alt="...">
	                        	<i class="icon-zoomin hide"></i>
	                        </a>
	                    </div>
					</div>
                </div>
                <div class="col-md-6">
                	<div class="row">
                		<div class="col-md-12">
                			<h1 class="text-left text-danger no-margin no-padding"><strong>$1000</strong></h1>
                		</div>
                		<div class="col-md-12 no-margin gray-bg-2">
                			<p><h3 class="text-left">Detalles</h3></p>
                			<div class="col-md-12"><p><h5>Aldfko skadow adlqom asdmklml 12 sadkmiru coirnal ajsdhjker weldkdlfn keinf alsdifn qldiap alsdkdn asdlk</h5></p></div>

                		</div>
                		<div class="col-md-12 no-margin gray-bg-2">
                			<p><h3 class="text-left text-info">Av. Rivadavia 233, San Martin</h3></p>
                		</div>
                	</div>
                </div>
                <div class="col-md-12 text-right"><p><h2>Publicado por: Alan Diaz</h2></p></div>
                <!-- <div class="col-md-12">
                	<div class="col-md-12">
                		<div class="col-md-12 no-margin no-padding" style="background-color: #FFFFFF">
                			<div class="col-md-4 no-padding no-margin">
                				<h6><strong>Anunciante:</strong>Roberto</h6>
                			</div>
                		</div>
	                	<form class="no-margin no-padding">
	                		<div class="form-group">
							    <textarea class="form-control" rows="3"></textarea>
							</div>
							<button type="submit" class="btn btn-info btn-lg"><h5><strong>Consultar</strong></h5></button>
	                	</form>
	                </div>
                </div> -->
			</div>	
		</section>
	</div>
	
	<?php  include "pie.php"  ?>

</body>
<script type="text/javascript">
	$('.carousel').carousel()
	var elements = document.getElementsByName("thumbnail");
	//algo hay que hacer aca porque no funciona y en consola de navegador si (elements[i].getAttribute("name"))

	for (var i = 0; i < elements.length; i++) {	
		elements[i].addEventListener("click", function(self) {
		  	var numero = parseInt(elements[i].getAttribute("name"));
			$('.carousel').carousel(numero);
		});
	}

</script>
</html>

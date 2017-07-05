<?php
function url(){
	return sprintf(
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		''
	);
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venta de productos cerca de ti | Sudestevende</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<<<<<<< Updated upstream
		
	<link rel="stylesheet" href="panel.css" />
=======
	<link rel="stylesheet" href="<?=url()?>/panel.css" />
>>>>>>> Stashed changes
	<!--<link rel="stylesheet" href="assets/assets/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="<?=url()?>/assets/css/reset.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/animate.min.css" />
	<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
<<<<<<< Updated upstream
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/socials.css" />
	<link rel="stylesheet" href="assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="assets/css/flexslider.css" />
	<link rel="stylesheet" href="assets/css/simpletextrotator.css" />
	<link rel="stylesheet" href="assets/css/cubeportfolio.min.css" />
	<link rel="stylesheet" href="assets/css/timeline.css" />
	<link rel="stylesheet" href="assets/css/owl.carousel.css" />
	<link rel="stylesheet" href="assets/css/settings-ie8.css" />
	<link rel="stylesheet" href="assets/css/settings.css" />
	<link rel="stylesheet" href="assets/css/style.css" />

	<link rel="stylesheet" href="assets/css/ml.css" />
	<link rel="stylesheet" href="assets/css/backgrounds.css" />
	<link rel="stylesheet" href="assets/css/responsive.css" />
	<link id="changeable_tone" rel="stylesheet" href="assets/css/page_tones/dark.css" />
	<link  rel="stylesheet" href="assets/css/skill.css" />
	<link rel="shortcut icon" href="assets/icons/favicon.ico" type="image/x-icon">

=======
	<link rel="stylesheet" href="<?=url()?>/assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/socials.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/flexslider.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/simpletextrotator.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/cubeportfolio.min.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/timeline.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/owl.carousel.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/settings-ie8.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/settings.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/style.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/ml.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/backgrounds.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/responsive.css" />
	<link id="changeable_tone" rel="stylesheet" href="<?=url()?>/assets/css/page_tones/dark.css" />
	<link  rel="stylesheet" href="<?=url()?>/assets/css/skill.css" />
	<link rel="shortcut icon" href="<?=url()?>/assets/icons/favicon.ico" type="image/x-icon">
>>>>>>> Stashed changes
	<meta name="theme-color" content="#3680ff">
</head>
<body class="parallax">
	<nav id="navigation" class="white-nav">
	<div class="navigation first-nav double-nav raleway b-shadow">
		<div class="nav-inner">
			<div class="logo f-left">
				<a href="bienvenido" class="logo-link scroll">
					<div style="display:inline-flex">
						<!--<img src="images/logo.png"/>-->
						<div class="text">
							<p class="no-margin no-padding extrabold">sudestevende</p>
						</div>
						<!-- aca pongo el buscador para que no aparezca en el menu dezplegable hay que acomodarlo-->
						<div class="f-left">						
								<form action="resultado.php" method="get" class="" >
									<div class="form-group">										
										<input class="search colored transition" type="text" name="Search" placeholder=" Realiza tu busqueda!">
									</div>

								</form>
							</div>
							<i class="glyphicons glyphicon glyphicon-search"></i>
					</div>
				</a>
			</div>			
			<a class="mobile-nav-button"><i class="fa fa-bars"></i></a>
			<div class="nav-menu f-right">
				<ul class="nav semibold">
					    
					<?php if (isset($_SESSION['login'])) { ?>
						<li  class="dropdown libtn">
									
							<a href="#" class="dropdown-toggle botonusuario" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php $user=$_SESSION ["usu_login"];
 								echo($user); ?><span class="caret"></span></a>
				                  <ul class="dropdown-menu">
				                    <li><a href="#">Mi cuenta</a></li>
				                    <li><a href="logout.php">Salir</a></li>
				                 </ul>
						</li>
						
					<?php } else { ?>
						<li><a href="registrandome" class="scroll">Regístrate</a></li>
						<li><a href="form-login.php" class="scroll">Ingresa</a></li>
					<?php } ?>

					<li><a href="vender" class="scroll">Vender</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
	

								  
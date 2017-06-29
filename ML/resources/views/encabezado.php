<?php
/*function url(){
	return sprintf(
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		''
	);
}*/
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venta de productos cerca de ti | Sudestevende</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=url()?>/panel.css" />
	<!--<link rel="stylesheet" href="assets/assets/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="<?=url()?>/assets/css/reset.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/animate.min.css" />
	<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
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
					</div>

				</a>
			</div>
			<a class="mobile-nav-button"><i class="fa fa-bars"></i></a>
			<div class="nav-menu f-right">
				<ul class="nav semibold">
					     <li>
							 <div class="f-left">
								<form action="resultado.php" method="get" class="" >
									<div class="form-group">
										<i class="glyphicons glyphicon glyphicon-search"></i>
										<input class="search colored transition" type="text" name="Search" placeholder=" Realiza tu busqueda!">
									</div>
									<!--<select name="cat_id">
										<option value=0>- Categorias -</option>
									</select>-->

								</form>
							</div>
						 </li>
					<?php if (isset($_SESSION['login'])) { ?>
						<li><a class="colored" href="logout.php">Salir</a></li>
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
	

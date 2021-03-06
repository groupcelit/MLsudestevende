<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venta de productos cerca de ti | Sudestevende</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="assets/assets/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="<?=url()?>/assets/css/animate.min.css" />
	<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="<?=url()?>/assets/css/reset.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/socials.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/timeline.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/style.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/ml.css" />
	<link rel="stylesheet" href="<?=url()?>/assets/css/responsive.css" />
	<link  rel="stylesheet" href="<?=url()?>/assets/css/skill.css" />
	<link rel="shortcut icon" href="<?=url()?>/assets/icons/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Lobster+Two:700|Open+Sans" rel="stylesheet">
	<meta name="theme-color" content="#3680ff">
	{{--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>--}}
	{{--<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-5918529515154442",
			enable_page_level_ads: true
		});
	</script>--}}
</head>
<body class="parallax">
	<nav id="navigation" class="white-nav">
	<div class="navigation first-nav raleway b-shadow">
		<div class="nav-inner">
			<div class="logo f-left">
				<a href="/bienvenido" class="logo-link scroll">
					<div class="inline-flex">
						<!--<img src="images/logo.png"/>-->
						<div class="text hidden-xs lobstertwo">
							<p class="no-margin no-padding extrabold t-shadow">SudesteVende</p>
						</div>
					</div>
				</a>
			</div>
			<div class="clear-nav f-left">
				<form action="/search" method="GET" role="search" class="" >
					<div type="text" class="input-group">
						<span class="input-addon"><i class="glyphicons glyphicon glyphicon-search"></i></span>
						<input class="search colored transition" type="text" name="search" placeholder=" Realiza tu busqueda!" value="" tabindex="1" max-length="120" autocapitalize="off" autocorrect="off" spellcheck="false" aria-autocomplete="list" aria-haspopup="true" aria-owns="chs-popover-3" autocomplete="off">
					</div>
				</form>
			</div>
			<a class="mobile-nav-button"><i class="fa fa-bars"></i></a>
			<div class="nav-menu f-right">
				<ul class="nav semibold">
					<?php if (isset($_SESSION['key']) && $_SESSION['key']>0) { ?>
						<li  class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION ["username"]?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/mis_anuncios">Mi cuenta</a></li>
								<li><a href="/salir">Salir</a></li>
							</ul>
						</li>
					<?php } else { ?>
						<li><a href="/registrandome" class="scroll">Regístrate</a></li>
						<li><a href="/ingresar" class="scroll">Ingresa</a></li>
					<?php } ?>

					<li><a href="/vender" class="scroll">Vender</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>

	

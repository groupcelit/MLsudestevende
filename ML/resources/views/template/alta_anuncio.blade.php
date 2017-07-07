@include('encabezado')
</head>
<body>
<!--	<div id="top"><img src="imagenes/top.png" alt="encabezado" width="980" height="80"></div>
-->	<div id="nav">
    @include('menu')
</div>
<div id="main" class="">
    @include('menu.aside')
    <section id="view_anuncio" class="results grid clear-main">
        <div class="col-md-12 white-bg form b-shadow">
            <div class="col-md-12">
                <h1 class="text text-left text-primary"><?=$anuncio['nombre']?></h1>
                <span class="strip"></span>
            </div>
            <div class="col-md-6">
                <div class="col-xs-12 no-padding" id="slider">
                    <!-- Top part of the slider -->
                    <!--<div class="row">-->
                    <div id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                            <?php
                                foreach ($anuncio['foto'] as $key => $foto){
                                    if($key==0){$class="active";}else{$class="";}
                            ?>
                                    <div class="<?=$class?> item" data-slide-number="<?=$key?>">
                                        <img class="carousel-product-img" src="<?=url().'/'.$foto?>" alt="<?=$anuncio['nombre'].$key?>">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- Carousel nav -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
                <div class="col-xs-12" id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                        <?php
                            foreach ($anuncio['foto'] as $key => $foto){                        ?>
                            <li class="col-xs-2 no-padding">
                                <a class="thumbnail" id="carousel-selector-<?=$key?>" data-target="#lightbox">
                                    <img  class="mini" src="<?=url().'/'.$foto?>" alt="<?=$anuncio['nombre'].$key?>">
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="col-md-12">
                        <h1 class="text-left text-danger no-margin no-padding"><strong><?=$anuncio['precio']?></strong></h1>
                    </div>
                    <div class="col-md-12 no-margin gray-bg-2 span-with-bg">
                        <p><h3 class="text-left">Detalles</h3></p>
                        <div class="col-md-12 span-with-bg">
                            <p>
                                <h5><?=$anuncio['descripcion']?></h5>
                            </p>
                            <br>
                            <p>
                                <h3 class="text-left text-info capitalize"><?=$anuncio['persona']->direccion?></h3>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <p>
                <h4><small>Publicado por: <span class="capitalize"><?=$anuncio['persona']->fullname?></span></small></h4>
                </p>
            </div>

        </div>
    </section>
</div>
@include('pie')
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

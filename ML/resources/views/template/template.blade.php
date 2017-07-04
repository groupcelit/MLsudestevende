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
                <h1 class="text text-left text-primary">Macintosh 1987</h1>
            </div>
            <div class="col-md-6">
                <div class="col-xs-12 no-padding" id="slider">
                    <!-- Top part of the slider -->
                    <!--<div class="row">-->
                    <div id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item" data-slide-number="0">
                                    <img class="carousel-product-img" src="images/bg-01.jpg" alt="...">
                                </div>
                                <div class="item" data-slide-number="1">
                                    <img class="carousel-product-img" src="images/bg_about.jpg" alt="...">
                                </div>
                                <div class="item" data-slide-number="2">
                                    <img class="carousel-product-img" src="images/background22.jpg" alt="...">
                                </div>
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
                        <li class="col-xs-2 no-padding">
                            <a class="thumbnail" id="carousel-selector-0" data-target="#lightbox">
                                <img  class="mini" src="images/bg-01.jpg" alt="...">
                            </a>
                        </li>
                        <li class="col-xs-2 no-padding">
                            <a class="thumbnail" id="carousel-selector-1" data-target="#lightbox">
                                <img class="mini" src="images/bg_about.jpg" alt="...">
                            </a>
                        </li>
                        <li class="col-xs-2 no-padding">
                            <a class="thumbnail" id="carousel-selector-2" data-target="#lightbox">
                                <img class="mini" src="images/background22.jpg" alt="...">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="col-md-12">
                        <h1 class="text-left text-danger no-margin no-padding"><strong>$1000</strong></h1>
                    </div>
                    <div class="col-md-12 no-margin gray-bg-2 span-with-bg">
                        <p><h3 class="text-left">Detalles</h3></p>
                        <div class="col-md-12 span-with-bg">
                            <p>
                                <h5>Lorem ipsum dolor sit amet, ut vel dico ignota, ad essent apeirian his. Te eam eius commodo honestatis, duo solum possim ne. Qui impetus persius molestiae ne. Ut eam ancillae pertinacia, te cibo ignota contentiones his. Urbanitas vituperata repudiandae te pri.</h5>
                            </p>
                            <br>
                            <p>
                                <h3 class="text-left text-info">Av. Rivadavia 233, San Martin</h3>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <p>
                <h4><small>Publicado por: Alan Diaz</small></h4>
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

@include('encabezado')
              </head>
                <body>
                    <div id='nav'>
                        @include('menu')
                    </div>
                    <div id='main' class=''>
                        @include('menu.aside')<section id="view_anuncio" class="results grid clear-main">
        <div class="col-md-12 white-bg form b-shadow">
            <div class="col-md-12">
                <h1 class="text text-left text-primary">asd</h1>
                <span class="line">
                    <dl class="vip-title-info">
                        <div class="item-conditions">
                        <dt>
                             <span class="vip-icon-sprite icon-label"></span>
                        </dt>
                             <dd>
                                 <i class="fa fa-tag" aria-hidden="true"></i>
                                  Nuevo                             </dd>
                        </div>
                    </dl>
                </span>
            </div>
            <div class="col-md-6">
                <div class="col-xs-12 no-padding" id="slider">
                    <!-- Top part of the slider -->
                    <!--<div class="row">-->
                    <div id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel" >
                            <!-- Carousel items -->
                            <div class="carousel-inner flex-content" data-toggle="modal" data-target="#myModal" data-interval="false">
                                                                <div class=" active item" data-slide-number="0">
                                        <img class="carousel-product-img " src="http://jlaupa.group-celit.com/public_images/205-asd" alt="asd0">
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
                                <a class="thumbnail" id="carousel-selector-0" number="0" >
                                    <img  class="mini" src="http://jlaupa.group-celit.com/public_images/205-asd" alt="asd0">
                                </a>
                            </li>
                                            </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="col-md-12 no-padding">
                        <h1 class="text-left text-danger no-margin no-padding"><strong>$100</strong></h1>
                    </div>
                    <div class="col-md-12 no-margin gray-bg-2 span-with-bg">
                        <p><h3 class="text-left">Detalles</h3></p>
                        <div class="col-md-12 span-with-bg">
                            <p>
                                <h5>asd</h5>
                            </p>
                            <br>
                            <p>
                                <h3 class="text-left text-info capitalize">Bernatene 534</h3>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <p>
                <h4><small>Publicado por: <span class="capitalize">Laupa Arquiño Jairo Alexis</span></small></h4>
                </p>
            </div>
        </div>
    </section>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog producto" role="document">
            <div class="modal-footer producto">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            <div class="modal-content flex-content">
                <div class="modal-body producto">
                    <div id="product-carousel-modal" class="carousel slide" data-ride="carousel" data-interval="false">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                                                        <div class="active item" data-slide-number="0">
                                <img src="http://jlaupa.group-celit.com/public_images/205-asd">
                            </div>
                                                    </div>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#product-carousel-modal" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#product-carousel-modal" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



</div>
                    @include('pie')
                    </body>                
                </html>
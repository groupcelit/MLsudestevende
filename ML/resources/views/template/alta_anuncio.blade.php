<!-- Aqui tendria que ir el encabezado como include -->
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
                        <div class="carousel slide" id="myCarousel" >
                            <!-- Carousel items -->
                            <div class="carousel-inner flex-content" data-toggle="modal" data-target="#myModal" data-interval="false">
                            <?php
                                foreach ($anuncio['foto'] as $key => $foto){
                                    if($key==0){$class="active";}else{$class="";}
                            ?>
                                    <div class=" <?=$class?> item" data-slide-number="<?=$key?>">
                                        <img class="carousel-product-img " src="<?=url().'/'.$foto?>" alt="<?=$anuncio['nombre'].$key?>">
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
                                <a class="thumbnail" id="carousel-selector-<?=$key?>" number="<?=$key?>" >
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
                    <?php
                    foreach ($anuncio['foto'] as $key => $foto){
                            if($key==0){$class="active";}else{$class="";}
                    ?>
                        <div class="<?=$class?> item" data-slide-number="<?=$key?>">
                            <img src="<?=url().'/'.$foto?>">
                        </div>
                    <?php
                    }
                    ?>
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

@include('pie')
</body>

</html>

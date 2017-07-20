{{--/
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 16/07/2017
 * Time: 08:42 PM
 /--}}
@include('encabezado')
</head>
<body>
<div id="nav">
    @include('menu')
</div>
<div id="main">
    <section  id="usuarios" class="grid inner">
        <div class="main-login main-center clear-main">
            <div class="container">
                <h1>Usuarios</h1>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    <input type="text" onkeyup="anuncios_admin.filtrarLista()" class="form-control" id="usuario_search" name="usuario_search" placeholder="Buscar por nombre de usuario">
                </div>
                <ul class="list" id="listaUser">
                    <li>
                        <div class="panel-body container">
                            <div class="col-sm-4 username">
                                <div class="item_details t-left" align="center">
                                   <b>Usuario</b>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="item_details t-left">
                                     <b>id anuncio</b>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                 <b>Estado</b>
                            </div>
                        </div>
                    </li>
                    <?php foreach($anuncios as $anuncio) {?>
                    <li>
                        <div class="panel-body container">
                            <div class="col-sm-1">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-3 username">
                                <div class="item_details t-left">
                                    <?=$anuncio->username?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="item_details t-left">
                                    #<?=$anuncio->id?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <form class="form-horizontal">
                                    <div class="form-group no-margin">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="anuncio_activo" id="<?=$anuncio->id?>" autocomplete="off" <?php if($anuncio->activo) {?> checked
                                                <?php } ?> > Activo
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </section>
</div>
@include('pie')
<script type="text/javascript" src="/assets/js/admin/anuncios_admin.js"></script>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 29/06/2017
 * Time: 09:41 AM
 */
namespace App\Http\Controllers;
/*Recursos a usar*/
use App\Models\Anuncios;
use App\Models\Fotos;
use App\Models\Categorias;
use App\Models\SubCategorias;
/*Recursos necesarios*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class AnunciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {


    }*/
    
    public function getAnuncioById($id_anuncio){
        $anuncio  = Anuncios::find($id_anuncio)->toArray();
        $q_fotos ="SELECT path
                   FROM  fotos
                   WHERE anuncio_id=".$id_anuncio;

        $results_fotos= \DB::select($q_fotos);
            foreach ($results_fotos as $foto){
                $anuncio['foto'][]=$foto->path;
            }

        $q_persona = "SELECT CONCAT(pd.apellidos,' ',pd.nombres) AS fullname,
                             pd.direccion AS direccion,
                             pd.email AS email,
                             CONCAT(pd.celular_codigo,'-',pd.celular) AS numero
                      FROM  usuarios AS u
                      INNER JOIN person_data AS pd ON pd.id=u.person_data_id
                      WHERE u.id=".$_SESSION['key'];

        $results_pd= \DB::select($q_persona);

        $anuncio['persona']=$results_pd[0];

        return $anuncio;
    }

    public function getAnuncioInfoById($id_anuncio){
        $anuncio  = Anuncios::find($id_anuncio)->toArray();

        $q_fotos ="SELECT path
                   FROM  fotos
                   WHERE anuncio_id=".$id_anuncio;
        $results_fotos= \DB::select($q_fotos);
            foreach ($results_fotos as $foto){
                $anuncio['foto'][]=$foto->path;
            }
        $q_anuncio = "SELECT a.nombre as nombre,
                          a.id as id,
                          a.usuario_id as u_id,
                          a.descripcion as descripcion ,
                          a.path as path_anuncio,
                          a.precio as precio,
                          a.stock as stock,
                          a.nuevo as nuevo,
                          a.subcategoria_id as subcategoria,
                          cat.id as categoria
                   FROM anuncios AS a
                   INNER JOIN sub_categorias AS subcat ON subcat.id = a.subcategoria_id
                   INNER JOIN categorias AS cat ON cat.id = subcat.categoria_id
                   WHERE a.id =".$id_anuncio;

        $results_pd= \DB::select($q_anuncio);
        if (is_null($results_pd)) {
            $anuncio['exito']  = false;
        }else {
            $anuncio['exito']  = true;
            $anuncio['info']=$results_pd[0];
        }

        return $anuncio;
    }
    
    /*public function getShow($bool){
        $limit = " LIMIT 40";
        $and = " ";


        if (isset($_SESSION['key']) && $_SESSION['key']> 0 && $bool) {

                $and = " AND a.usuario_id = ".$_SESSION['key'];
                $limit = " ";
        }

        $consulta="SELECT a.nombre as nombre,
                          a.id as id,
                          a.usuario_id as u_id,
                          a.descripcion as descripcion ,
                          a.path as path_anuncio,
                          a.precio as precio,
                          a.stock as stock,
                          f.path as path_foto
                   FROM anuncios AS a
                   INNER JOIN fotos AS f ON f.anuncio_id=a.id
                   WHERE f.principal=1 
                   AND a.borrado_logico = 0  ".$and."
                   ORDER BY a.creado_en DESC ".$limit;

        $results= \DB::select($consulta);
        return $results;
    }*/
    public function setTestTemplate(){
        $anuncio=$this->getAnuncioById(94);
        $archivo_a_subir = fopen("publicaciones/prueba301.php", "a");
        //readfile()

        $encabezado='<?php session_start(); ?>
                        <!DOCTYPE HTML>
                        <html lang="es">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Venta de productos cerca de ti | Sudestevende</title>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                            <link rel="stylesheet" href="/panel.css" />
                            <!--<link rel="stylesheet" href="assets/assets/css/bootstrap.min.css" />-->
                            <link rel="stylesheet" href="/assets/css/reset.css" />
                            <link rel="stylesheet" href="/assets/css/animate.min.css" />
                            <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
                            <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
                            <link rel="stylesheet" href="/assets/css/socials.css" />
                            <link rel="stylesheet" href="/assets/css/magnific-popup.css" />
                            <link rel="stylesheet" href="/assets/css/flexslider.css" />
                            <link rel="stylesheet" href="/assets/css/simpletextrotator.css" />
                            <link rel="stylesheet" href="/assets/css/cubeportfolio.min.css" />
                            <link rel="stylesheet" href="/assets/css/timeline.css" />
                            <link rel="stylesheet" href="/assets/css/owl.carousel.css" />
                            <link rel="stylesheet" href="/assets/css/settings-ie8.css" />
                            <link rel="stylesheet" href="/assets/css/settings.css" />
                            <link rel="stylesheet" href="/assets/css/style.css" />
                            <link rel="stylesheet" href="/assets/css/ml.css" />
                            <link rel="stylesheet" href="/assets/css/backgrounds.css" />
                            <link rel="stylesheet" href="/assets/css/responsive.css" />
                            <link id="changeable_tone" rel="stylesheet" href="/assets/css/page_tones/dark.css" />
                            <link  rel="stylesheet" href="/assets/css/skill.css" />
                            <link rel="shortcut icon" href="/assets/icons/favicon.ico" type="image/x-icon">
                            <meta name="theme-color" content="#3680ff">
                        </head>
                        <body class="parallax">
                            <nav id="navigation" class="white-nav">
                            <div class="navigation first-nav double-nav raleway b-shadow">
                                <div class="nav-inner">
                                    <div class="logo f-left">
                                        <a href="/bienvenido" class="logo-link scroll">
                                            <div class="inline-flex">
                                                <!--<img src="images/logo.png"/>-->
                                                <div class="text hidden-xs">
                                                    <p class="no-margin no-padding extrabold">sudestevende</p>
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
                                            <?php if (isset($_SESSION[\'key\']) && $_SESSION[\'key\'] > 0) { ?>
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
                        
                            
                                                ';
        fwrite($archivo_a_subir,$encabezado);
        fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
        fclose($archivo_a_subir);
    }

    public function setTemplate($nombre_archivo,$anuncio_id){
        $result='';
        $anuncio=$this->getAnuncioById($anuncio_id);
        $archivo_a_subir = fopen($nombre_archivo, "a");
        $encabezado='<?php session_start(); ?>
                        <!DOCTYPE HTML>
                        <html lang="es">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Venta de productos cerca de ti | Sudestevende</title>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                            <link rel="stylesheet" href="/panel.css" />
                            <!--<link rel="stylesheet" href="assets/assets/css/bootstrap.min.css" />-->
                            <link rel="stylesheet" href="/assets/css/reset.css" />
                            <link rel="stylesheet" href="/assets/css/animate.min.css" />
                            <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
                            <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
                            <link rel="stylesheet" href="/assets/css/socials.css" />
                            <link rel="stylesheet" href="/assets/css/magnific-popup.css" />
                            <link rel="stylesheet" href="/assets/css/flexslider.css" />
                            <link rel="stylesheet" href="/assets/css/simpletextrotator.css" />
                            <link rel="stylesheet" href="/assets/css/cubeportfolio.min.css" />
                            <link rel="stylesheet" href="/assets/css/timeline.css" />
                            <link rel="stylesheet" href="/assets/css/owl.carousel.css" />
                            <link rel="stylesheet" href="/assets/css/settings-ie8.css" />
                            <link rel="stylesheet" href="/assets/css/settings.css" />
                            <link rel="stylesheet" href="/assets/css/style.css" />
                            <link rel="stylesheet" href="/assets/css/ml.css" />
                            <link rel="stylesheet" href="/assets/css/backgrounds.css" />
                            <link rel="stylesheet" href="/assets/css/responsive.css" />
                            <link id="changeable_tone" rel="stylesheet" href="/assets/css/page_tones/dark.css" />
                            <link  rel="stylesheet" href="/assets/css/skill.css" />
                            <link rel="shortcut icon" href="/assets/icons/favicon.ico" type="image/x-icon">
                            <meta name="theme-color" content="#3680ff">
                        </head>
                        <body class="parallax">
                            <nav id="navigation" class="white-nav">
                            <div class="navigation first-nav double-nav raleway b-shadow">
                                <div class="nav-inner">
                                    <div class="logo f-left">
                                        <a href="/bienvenido" class="logo-link scroll">
                                            <div class="inline-flex">
                                                <!--<img src="images/logo.png"/>-->
                                                <div class="text hidden-xs">
                                                    <p class="no-margin no-padding extrabold">sudestevende</p>
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
                                            <?php if (isset($_SESSION[\'key\']) && $_SESSION[\'key\'] > 0) { ?>
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
                        
                            
                                                ';
        if(fwrite($archivo_a_subir,$encabezado)){
            fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
            return true;
        }else{
            return false;
        }
        fclose($archivo_a_subir);

    return $result;
    }

    public function setImage($imagenes, $url_amigable ,$anuncio_id){
        foreach ($imagenes as $key => $img){
            if ($key==0){$principal=1;}else{$principal=0;}

            $foto= new Fotos();
            $foto->principal    =   $principal;
            $foto->creado_en    =   date("Y-m-d H:i:s");
            $foto->anuncio_id   =   $anuncio_id;
            $foto->save();
            $nombre_foto='public_images/'.$foto->id.'-'.$url_amigable;
            $foto->path=$nombre_foto;

            $archivo =$foto->id.'-'.$url_amigable;
            if($img->move('public_images/',$archivo)){
                if($foto->save()){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }


        }

    }

    public function setAnuncio(Request $request){
        /*$request->file(); archivo*/
        $result='';
        $categoria_id  = $request->input('categoria_id');
        $subcategoria_id = $request->input('subcategoria_id');

        $anuncio=new Anuncios();
        $anuncio->subcategoria_id = $subcategoria_id;
        if($request->input('descripcion')){
            $anuncio->descripcion   = $request->input('descripcion');
        }
        $anuncio->usuario_id   = $_SESSION['key'];
        $anuncio->creado_en   = date("Y-m-d H:i:s");
        $anuncio->nombre    = $request->input('nombre');
        if($request->input('precio')) {
            $anuncio->precio = $request->input('precio');
        }
        $anuncio->stock     = $request->input('stock');
        $anuncio->nuevo     = $request->input('nuevo');
        $anuncio->borrado_logico = 0;
        $anuncio->save();

        $url_amigable= $this->urls_amigables($anuncio->nombre);
        $nombre_publicacion='publicaciones/'.$categoria_id.'-'.$subcategoria_id.'-'.$anuncio->id.'-'.$url_amigable;
        $anuncio->path=$nombre_publicacion;
        $anuncio->save();

       if($this->setImage($request->file('img'),$url_amigable,$anuncio->id)){
           $result = array('exito'=> true,
                           'msg' => 'Imagen grabada'
                    );

           $nombre_archivo=$nombre_publicacion.'.php';
           if($this->setTemplate($nombre_archivo,$anuncio->id)){
               $result = array('exito' => true,
                               'msg'   => 'Se creo el template'
                           );
           }else{
               $result = array('exito' => false,
                                'msg'  => 'No se pudo crear el template'
                           );
           }

       }else{
           $result = array( 'exito'=> false,
                             'msg' => 'No se pudo guardar la imagen'
           );
       }

    return $result;
    }

    public function editAnuncio(Request $request){
        $anuncio = Anuncios::find($request->input('anuncio_id'));
        $anuncio->modificado_en = date('Y-m-d H:i:s');

        $categoria_id  = $request->input('categoria_id');
        $subcategoria_id = $request->input('subcategoria_id');

        $anuncio->subcategoria_id = $request->input('subcategoria_id');
        if($request->input('descripcion')){
            $anuncio->descripcion   = $request->input('descripcion');
        }

        $anuncio->nombre    = $request->input('nombre');
        if($request->input('precio')) {
            $anuncio->precio = $request->input('precio');
        }
        $anuncio->stock     = $request->input('stock');
        $anuncio->nuevo     = $request->input('nuevo');

        $anuncio->save();

        $url_amigable= $this->urls_amigables($anuncio->nombre);
        $nombre_publicacion='publicaciones/'.$categoria_id.'-'.$subcategoria_id.'-'.$anuncio->id.'-'.$url_amigable;
        $anuncio->path=$nombre_publicacion;
        $anuncio->save();

       if($this->setImage($request->file('img'),$url_amigable,$anuncio->id)){
           $result = array('exito'=> true,
                           'msg' => 'Imagen grabada'
                    );

           $nombre_archivo=$nombre_publicacion.'.php';
           if($this->setTemplate($nombre_archivo,$anuncio->id)){
               $result = array('exito' => true,
                               'msg'   => 'Se creo el template'
                           );
           }else{
               $result = array('exito' => false,
                                'msg'  => 'No se pudo crear el template'
                           );
           }

       }else{
           $result = array( 'exito'=> false,
                             'msg' => 'No se pudo guardar la imagen'
           );
       }

    return $result;

    }

    public function getShow($bool){
        $query = \DB::table('anuncios as a')
            ->join('fotos as f','f.anuncio_id','=','a.id')
            ->select('a.nombre as nombre',
                'a.id as id',
                'a.usuario_id as u_id',
                'a.descripcion as descripcion',
                'a.path as path_anuncio',
                'a.precio as precio',
                'a.stock as stock',
                'f.path as path_foto')
            ->where('f.principal','=',1);

        if (isset($_SESSION['key']) && $_SESSION['key']> 0 && $bool) {
            $query = $query->where('a.usuario_id','=',$_SESSION['key']);
        }

        $query= $query->where('a.borrado_logico','=',0)
            ->orderBy('a.creado_en', 'desc')
            ->paginate(40);

        /*var_dump($query->links('home'));*/
        return $query;
    }

    public function getSearch(Request $request){
        $keyword=  $request->input('search');

        $query = \DB::table('anuncios as a')
            ->join('fotos as f','f.anuncio_id','=','a.id')
            ->select('a.nombre as nombre',
                    'a.id as id',
                    'a.usuario_id as u_id',
                    'a.descripcion as descripcion',
                    'a.path as path_anuncio',
                    'a.precio as precio',
                    'a.stock as stock',
                    'f.path as path_foto')
            ->where('f.principal','=',1)
            ->where(function($query) use ($keyword){
                return $query->orWhere('a.nombre', 'like', "%$keyword%")
                             ->orWhere('a.nombre', 'like', "%$keyword")
                             ->orWhere('a.nombre', 'like', "$keyword%")
                             ->orWhere('a.nombre', '=', $keyword)

                             ->orWhere('a.descripcion','like',"%$keyword%")
                             ->orWhere('a.descripcion','like',"$keyword%")
                             ->orWhere('a.descripcion','like',"%$keyword")
                             ->orWhere('a.descripcion','=',$keyword);
            })
            ->where('a.borrado_logico','=',0)
            ->orderBy('a.nombre', 'asc')
            ->paginate(40);

        return view('home', ['anuncios' => $query]);
    }

    public function getAnuncioCodigo($codigo){
        $query = \DB::table('anuncios AS a')
                    ->join('fotos AS f','f.anuncio_id','=','a.id')
                    ->join('sub_categorias AS sc','sc.id','=','a.subcategoria_id')
                    ->select('a.id      AS id',
                            'a.nombre   AS nombre',
                            'a.usuario_id  AS u_id',
                            'a.descripcion AS descripcion',
                            'a.path     AS path_anuncio',
                            'a.precio   AS precio',
                            'a.stock    AS stock',
                            'f.path     AS path_foto')
                    ->where('f.principal','=',1)
                    ->where('sc.codigo','like',"%$codigo%")
                    ->where('a.borrado_logico','=',0)
                    ->orderBy('a.nombre', 'asc')
                    ->paginate(40);
        return view('home', ['anuncios' => $query]);
    }

}

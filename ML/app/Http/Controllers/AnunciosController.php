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
        $archivo_a_subir = fopen(resource_path()."/views/contenido_anuncios/prueba5.blade.php", "a");
        //readfile()

        $file="@include('encabezado')
              </head>
                <body>
                    <div id='nav'>
                        @include('menu')
                    </div>
                    <div id='main' class=''>
                        @include('menu.aside')";
                    fwrite($archivo_a_subir,$file);
                    fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
            $file="</div>
                @include('pie')
                </body>                
            </html>";
        fwrite($archivo_a_subir,$file);
        fclose($archivo_a_subir);
    }

    public function setTemplate($nombre_archivo,$anuncio_id){
        $anuncio=$this->getAnuncioById($anuncio_id);
        $archivo_a_subir = fopen($nombre_archivo, "a");
        $file="@include('encabezado')
              </head>
                <body>
                    <div id='nav'>
                        @include('menu')
                    </div>
                    <div id='main' class=''>
                        @include('menu.aside')";

        if(fwrite($archivo_a_subir,$file)){
                fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
                $file="</div>
                    @include('pie')
                    </body>                
                </html>";
                fwrite($archivo_a_subir,$file);
                fclose($archivo_a_subir);

            return true;
        }else{
            return false;
        }
        fclose($archivo_a_subir);
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
        $nombre_publicacion='p/'.$categoria_id.'-'.$subcategoria_id.'-'.$anuncio->id.'-'.$url_amigable;
        $anuncio->path=$nombre_publicacion;
        $anuncio->save();

       if($this->setImage($request->file('img'),$url_amigable,$anuncio->id)){
           $result = array('exito'=> true,
                           'msg' => 'Imagen grabada'
                    );

           $nombre_archivo= resource_path()."/views/contenido_anuncios/".$nombre_publicacion.".blade.php";
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

           $nombre_archivo= resource_path()."/views/contenido_anuncios/".$nombre_publicacion.".blade.php";
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

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

    public function urls_amigables($url) {
        // Tranformamos a minusculas
        $url = strtolower($url);
        //Rememplazamos caracteres especiales latinos
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        // Añaadimos los guiones
        $find = array(' ', '&', '\r\n', '\n', '+');
        $url = str_replace ($find, '-', $url);
        // Eliminamos y Reemplazamos demás caracteres especiales
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        return $url;

    }
    
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
    
    public function getShow($bool){
        $limit = " LIMIT 40";
        $and = " ";

        if (isset($_SESSION['KEY']) && $_SESSION['KEY']>0 && $bool) {
                $and = " AND a.usuario_id = ".$_SESSION['KEY'];
                $limit = " ";
        }

        $consulta="SELECT a.nombre as nombre,
                          a.id as id,
                          a.descripcion as descripcion ,
                          a.path as path_anuncio,
                          a.precio as precio,
                          a.stock as stock,
                          f.path as path_foto
                   FROM anuncios AS a
                   INNER JOIN fotos AS f ON f.anuncio_id=a.id
                   WHERE f.principal=1 
                   AND a.borrado_logico = 0 ".$and.$limit;

        $results= \DB::select($consulta);
        return $results;
    }


    public function setTemplate($nombre_archivo,$anuncio_id){
        $anuncio=$this->getAnuncioById($anuncio_id);
        $archivo_a_subir = fopen($nombre_archivo, "a");
        fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
        fclose($archivo_a_subir);
    }

    public function setTestTemplate(){
        $anuncio=$this->getAnuncioById(1);
        $archivo_a_subir = fopen("publicaciones/prueba90.php", "a");
        fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
        fclose($archivo_a_subir);
    }

    public function setAnuncio(Request $request){
        /*$request->file(); archivo*/
        $fecha_actual  = date("Y-m-d H:i:s");
        $categoria_id  = $request->input('categoria_id');
        $subcategoria_id = $request->input('subcategoria_id');

        $anuncio=new Anuncios();
        $anuncio->subcategoria_id = $subcategoria_id;
        if($request->input('descripcion')){
            $anuncio->descripcion   = $request->input('descripcion');
        }
        $anuncio->usuario_id   = $_SESSION['key'];
        $anuncio->creado_en   = $fecha_actual;
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

        foreach ($request->file('img') as $key => $img){
            if ($key==0){$principal=1;}else{$principal=0;}
            $foto= new Fotos();
            $foto->principal=$principal;
            $foto->creado_en=$fecha_actual;
            $foto->anuncio_id=$anuncio->id;
            $foto->save();
            $nombre_foto='public_images/'.$foto->id.'-'.$url_amigable;
            $foto->path=$nombre_foto;

            $archivo =$foto->id.'-'.$url_amigable;
            $img->move('public_images/',$archivo);
            $foto->save();
        }

        $nombre_archivo=$nombre_publicacion.'.php';
        $this->setTemplate($nombre_archivo,$anuncio->id);

        return redirect('/mis_anuncios');
    }

    public function getSearch(Request $request){
        //get keywords input for search
        $keyword=  $request->input('search');
        $consulta='SELECT a.nombre as nombre,
                          a.descripcion as descripcion,
                          a.path as path_anuncio,
                          a.precio as precio,
                          f.path as path_foto
                   FROM anuncios AS a
                   INNER JOIN fotos AS f ON f.anuncio_id=a.id
                   WHERE f.principal=1
                   AND (a.nombre like "%'.$keyword.'%" OR a.descripcion like "%'.$keyword.'%")
                   AND a.borrado_logico = 0
                   ORDER BY a.nombre ASC
                   LIMIT 40';
        $results= \DB::select($consulta);
        return view('home', ['anuncios' => $results]);

    }

    public function getAnuncioCodigo($codigo){
        //$codigo=$request->input('codigo');
        $consulta='SELECT a.nombre as nombre,
                          a.descripcion as descripcion,
                          a.path as path_anuncio,
                          a.precio as precio,
                          f.path as path_foto
                   FROM anuncios AS a
                   INNER JOIN fotos AS f ON f.anuncio_id=a.id
                   INNER JOIN sub_categorias AS sc ON sc.id=a.subcategoria_id 
                   WHERE f.principal=1
                   AND  sc.codigo like "%'.$codigo.'%"
                   AND a.borrado_logico = 0
                   ORDER BY a.nombre ASC
                   LIMIT 40';
        $results= \DB::select($consulta);

        return view('home', ['anuncios' => $results]);
    }

}

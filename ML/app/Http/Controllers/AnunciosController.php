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
        
        $q_persona = "SELECT CONCAT(u.apellidos,' ',u.nombres) AS fullname,
                             u.direccion AS direccion,
                             u.email AS email,
                             CONCAT(u.celular_codigo,'-',u.celular) AS numero
                      FROM  usuario AS u
                      INNER person_data AS pd ON u.person_data_id=pd.id
                      WHERE u.id=".$_SESSION['key'];

        $results_pd= \DB::select($q_persona);

        $anuncio['persona']=$results_pd;

        return $anuncio;
    }
    
    public function getShow($bool){
        $limit = " LIMIT 20";
        $consultaid = "";

        if (isset($_SESSION['KEY']) && $_SESSION['KEY']>0 && $bool) {
                $consultaid = "AND
                            a.usuario_id =".$id;
                $limit = "";
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
                   WHERE f.principal=1 ".$consultaid.$limit;
        $results= \DB::select($consulta);
        return $results;
    }


    public function setTemplate($nombre_archivo,$anuncio_id){
        $anuncio=$this->getAnuncioById($anuncio_id);
        $archivo_a_subir = fopen($nombre_archivo, "a");
        fwrite($archivo_a_subir,view('template.alta_anuncio', ['anuncio' => $anuncio]));
        fclose($archivo_a_subir);
    }


    public function setAnuncio(Request $request){
        /*$request->file(); archivo*/
        $fecha_actual  = date("Y-m-d H:i:s");
        $categoria_id  = $request->input('categoria_id');
        $sub_cateogria_id = $request->input('sub_categoria_id');

        //Aca comienza la prueba de subida de imagenes
/*
        $prd_nombre=$_POST["prd_nombre"];
        $prd_descripcion=$_POST["prd_descripcion"];
        $prd_precio=$_POST["prd_precio"];
        $estado=$_POST['estado'];
        $stock=$_POST["stock"];
        $sub_cat_id=$_POST["sub_cat_id"];
        ;*/

        /*mysqli_query("INSERT INTO anuncios (nombre,descripcion,codigo,precio,descuento,stock,nuevo,destacado,subcategoria_id,creado_en,modificado_en)
                           VALUES ('".$prd_nombre."','".$prd_descripcion."',null,".$prd_precio.",null,1,1,0,'".$sub_cat_id."','".$fecha_actual."',null)",$con) or die ("pro_insert_db");*/

        $anuncio=new Anuncios();
        $anuncio->subcategoria_id = $sub_cateogria_id;
        $anuncio->descripcion   = $request->input('descripcion');
        $anuncio->usuario_id   = $id_usuario ;
        $anuncio->creado_en   = $fecha_actual;
        $anuncio->nombre    = $request->input('nombre');
        $anuncio->precio    = $request->input('precio');
        $anuncio->stock     = $request->input('stock');
        $anuncio->nuevo     = $request->input('nuevo');
        $anuncio->borrado_logico = 0;
        $anuncio->save();

        $url_amigable= $this->urls_amigables($anuncio->nombre);
        $nombre_publicacion='publicaciones/'.$categoria_id.'/'.$sub_cateogria_id.'/'.$anuncio->id.'-'.$url_amigable;
        $anuncio->path=$nombre_publicacion;
        $anuncio->save();

        foreach ($request->file('img') as $key => $img){

            if ($key==0){$principal=1;}else{$principal=0;}
            $foto= new Fotos();
            $foto->principal=$principal;
            $foto->creado_en=$fecha_actual;
            $foto->$anuncio->id;
            $foto->save();
            $nombre_foto='public_images/'.$foto->id.'-'.$url_amigable;
            $foto->path=$nombre_foto;        
           
            $archivo ='public_images/'.$foto->id.'-'.$url_amigable;
            $dir_subida = url().'/'.$archivo;
            move_uploaded_file($name_files, $dir_subida);
        }

        $nombre_archivo=$nombre_publicacion.'.php';
        $this->setTemplate($nombre_archivo,$anuncio->id);

        return redirect('/misanuncios');
    }

}

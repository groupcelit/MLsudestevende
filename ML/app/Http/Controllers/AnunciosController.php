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

    public function getShow(){
        $consulta="SELECT a.nombre as nombre,
                          a.descripcion as descripcion ,
                          a.path as path_anuncio,
                          a.precio as precio,
                          f.path as path_foto
                   FROM anuncios AS a
                   INNER JOIN fotos AS f ON f.anuncio_id=a.id
                   WHERE f.principal=1
                   LIMIT 20";
        $results= \DB::select($consulta);
        return $results;
    }

    public function setAnuncio(Request $request){
        /*$request->file(); archivo*/
        $fecha_actual  = date("Y-m-d H:i:s");
        $categoria_id  = $request->input('categoria_id');
        $subcategoria_id = $request->input('subcategoria_id');
   
        $anuncio=new Anuncios();
        $anuncio->subcategoria_id = $subcategoria_id;
        $anuncio->descripcion   = $request->input('descripcion');
        $anuncio->usuario_id   = $_SESSION['key'];
        $anuncio->creado_en   = $fecha_actual;
        $anuncio->nombre    = $request->input('nombre');
        $anuncio->precio    = $request->input('precio');
        $anuncio->stock     = $request->input('stock');
        $anuncio->nuevo     = $request->input('nuevo');
        $anuncio->borrado_logico = 0;
        $anuncio->save();

        $url_amigable= $this->urls_amigables($anuncio->nombre);
        $nombre_publicacion='publicaciones/'.$categoria_id.'-'.$subcategoria_id.'-'.$anuncio->id.'-'.$url_amigable;
        $anuncio->path=$nombre_publicacion;
        $anuncio->save();


        $nombre_archivo=$nombre_publicacion.'.php';
        $archivo_a_subir = fopen($nombre_archivo, "a");
        $contenido=@include('encabezado');
        fwrite($archivo_a_subir,$contenido);
        fclose($archivo_a_subir);
        /*echo 'Más información de depuración:';*/
        /*print_r($_FILES);*/
        /*	print "</pre>";*/

             /*basename($_FILES['img']['name'])*/
        //$fichero_subido = $dir_subida.basename($_FILES['img']['name']);
//	var_dump($_FILES);
        /*	echo '<pre>';*/
        //move_uploaded_file($_FILES['img']['tmp_name'], $dir_subida)
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

        return redirect('/misanuncios');
    }

    public function setTemplate($data=null){
        
        $nombre_archivo='publicaciones/prueba13.php';
        $archivo_a_subir = fopen($nombre_archivo, "a");
        fwrite($archivo_a_subir,view('encabezado', ['name' => 'hola mundo']));
        fclose($archivo_a_subir);

    }

}

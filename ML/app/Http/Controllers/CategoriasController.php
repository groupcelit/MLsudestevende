<?php
/**
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 29/06/2017
 * Time: 09:41 AM
 */
namespace App\Http\Controllers;
/*Recursos a usar*/
use App\Models\Categorias;
/*Recursos necesarios*/
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {


    }*/
   /* public function getShow(){
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
    }*/

    /*public function update(Request $request , $id=null){
        if ( $id > 0) {
            $anuncios = Anuncios::find($id);
            $anuncios->modificado_en = date('Y-m-d H:i:s');

            $persona_id  = $anuncios->person_data_id;
            $persona     = $this->actualizarPersona($request,$persona_id);

        }else{
            $persona  = $this->actualizarPersona($request);
            $anuncios = new Anuncios();
            $anuncios->person_data_id  = $persona->id;
            $anuncios->borrado_logico = 0;
            $anuncios->creado_en =  date('Y-m-d H:i:s');
            $anuncios->username  =  $request->input('usuario_username');
            $anuncios->premium   =  0;
            $anuncios->codigo    =  $request->input('usuario_codigo');
        }

        if( $request->input('usuario_password')) {
            $anuncios->password = $request->input('usuario_password');
        }

        $anuncios->save();

        $result['usuario']   =   $anuncios;
        $result['persona']   =   $persona ;
        return response()->json($result);
    }*/


    public function getCategorias(){
       $categorias= Categorias::where('borrado_logico', '=', 0)->get();
        
       return $categorias;
    }
    //
}

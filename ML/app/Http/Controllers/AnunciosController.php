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
    public function getShow(){
        $results= \DB::select("SELECT * FROM anuncios LIMIT 20");

        return $results;
    }
    
    public function update(Request $request , $id=null){
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
        /*if($anuncios->save()){
            return response()->json($new_anuncio);
        }else{
            return response()->json("error");
        }*/

        /*return ['id' => $id ,
                'title' => $request->input('title')
        ];*/
    } 
    //
}

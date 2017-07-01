<?php
/**
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 29/06/2017
 * Time: 09:41 AM
 */
namespace App\Http\Controllers;
/*Recursos a usar*/
use App\Models\Usuarios;
use App\Models\Persondata;
/*Recursos necesarios*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsuariosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {


    }*/

    public function saveUsuario(Request $request , $id=null){

       if ( $id > 0) {
           $usuarios = Usuarios::find($id);
           $usuarios->modificado_en = date('Y-m-d H:i:s');

           $persona_id  = $usuarios->person_data_id;
           $persona     = $this->actualizarPersona($request,$persona_id);

       }else{
           $persona  = $this->actualizarPersona($request);
           $usuarios = new Usuarios();
           $usuarios->person_data_id  = $persona->id;
           $usuarios->borrado_logico = 0;
           $usuarios->creado_en =  date('Y-m-d H:i:s');
           $usuarios->username  =  $request->input('usuario_username');
           $usuarios->premium   =  0;
           $usuarios->codigo    =  $request->input('usuario_codigo');
       }

       if( $request->input('usuario_password')) {
           $usuarios->password = $request->input('usuario_password');
       }

       $usuarios->save();

       $result['usuario']   =   $usuarios;
       $result['persona']   =   $persona ;
        return response()->json($result);
        /*if($usuarios->save()){
            return response()->json($new_anuncio);
        }else{
            return response()->json("error");
        }*/
        
        /*return ['id' => $id ,
                'title' => $request->input('title')
        ];*/
    }

    private function actualizarPersona($post,$id=null){
        if($id>0) {
            $person_data = Persondata::find($id);
            $person_data->modificado_en=date('Y-m-d H:i:s');
        }else{
            $person_data = new Persondata();
            $person_data->creado_en = date('Y-m-d H:i:s');
        }

        if($post->input('persona_apellidos')){
             $person_data->apellidos = $post->input('persona_apellidos');
        }
        if($post->input('persona_nombres')) {
            $person_data->nombres = $post->input('persona_nombres');
        }
        if($post->input('persona_fecha_nacimiento')) {
            $person_data->fecha_nacimiento = $post->input('persona_fecha_nacimiento');
        }
        if($post->input('persona_direccion')) {
            $person_data->direccion = $post->input('persona_direccion');
        }
        if($post->input('persona_email')) {
            $person_data->email = $post->input('persona_email');
        }
        if($post->input('persona_celular')) {
            $person_data->celular = $post->input('persona_celular');
        }
        if($post->input('persona_celular_codigo')) {
            $person_data->celular_codigo = $post->input('persona_celular_codigo');
        }


        $person_data->save();

        return $person_data;
    }
    //
    /*public function postLogin(Request $request){
        return $_SESSION;
    }*/

    public function postLogin(Request $request){
        $consulta='SELECT id ,
                          username
                   FROM usuarios                 
                   WHERE username="'.$request->input('usuario_username').'"
                   AND password="'.$request->input('usuario_password').'"
                   LIMIT 1';
         /* echo $consulta;*/
        $results= \DB::select($consulta);

        if(isset($results[0]->id) > 0){
            session_start(); //Si no está esta directiva no se puede hacer nada
            $_SESSION['login']=1;
            //Redirección a admin
            header("location:bienvenido");
            $_SESSION['key']=$results[0]->id;
            $_SESSION['username'] = $results[0]->username;
            $_SESSION['cookie']=session_id();
            $return['exito']=true;
            $return['result']=$_SESSION;
        }else{
            $return['exito']=false;
        }
        return $return;

    }
}

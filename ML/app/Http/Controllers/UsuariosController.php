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

    public function saveUsuario(Request $request){
      if (isset($_SESSION['key']) && $_SESSION['key']>0) {
        $id = $_SESSION['key'];
      } else {
        $id = null;
      }
      
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

        if($usuarios->save()){
          //$result['usuario']   =   $usuarios;
          $result['persona']   =  $persona ;
          $return['exito'] = true;
          $return['result'] = $result;
        }else{
            $return['exito'] = false;
            $return['result'] = null;
        }
        
        return response()->json($return);
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

    public function getDataPersona() {
      $q_persona = "SELECT pd.apellidos AS apellidos,
                          pd.nombres AS nombres,
                             pd.direccion AS direccion,
                             pd.email AS email,
                             pd.celular_codigo as celular_codigo,
                             pd.celular AS celular,
                             pd.fecha_nacimiento AS fecha_nacimiento
                      FROM  usuarios AS u
                      INNER JOIN person_data AS pd ON pd.id=u.person_data_id
                      WHERE u.id=".$_SESSION['key'];

        $results_pd= \DB::select($q_persona);

        return $results_pd[0];
    }
    //
    /*public function postLogin(Request $request){
        return $_SESSION;
    }*/

    public function postLogin(Request $request){
        $consulta='SELECT id ,
                          username,
                          codigo
                   FROM usuarios                 
                   WHERE username="'.$request->input('usuario_username').'"
                   AND password="'.$request->input('usuario_password').'"
                   LIMIT 1';
         /* echo $consulta;*/
        $results= \DB::select($consulta);

        if(isset($results[0]->id) > 0){
            $_SESSION['login']=1;
            $_SESSION['key']=$results[0]->id;
            $_SESSION['username'] = $results[0]->username;
            $_SESSION['keyword'] = $results[0]->codigo;
            $_SESSION['cookie']=session_id();
            $return['exito']=true;
            $return['result']=$_SESSION;
        }else{
            $return['exito']=false;
        }
        return $return;

    }

    public function destroySession(){
        session_unset();
        session_destroy();
    }
    
    /*public function getSession(Request $request){
        if ($request->session()->has('key')) {
            return true;
        }else{
            return false;
        }
    }   */
}

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

    public function getUserDataAdmin() {
        $consulta='SELECT   u.id AS id,
                            u.username AS username,
                            u.premium AS premium,
                            pd.email AS email
                      FROM  usuarios AS u
                      INNER JOIN person_data AS pd ON pd.id=u.person_data_id
                      WHERE u.borrado_logico = 0';
        $results_pd= \DB::select($consulta);

        return $results_pd;
    }

    public function updatePremiumUsuario($id) {

        $usuario = Usuarios::find($id);
        $usuario->modificado_en = date('Y-m-d H:i:s');
        
        if($usuario->premium == 0) {
          $usuario->premium = 1;
        }elseif ($usuario->premium == 1) {
          $usuario->premium = 0;
        }

        if($usuario->save()){
          $return['exito'] = true;
        }else{
            $return['exito'] = false;
        }
        
        return response()->json($return);                 
  
    }

    public function deleteUsuarioAdmin($id) {

      $usuario = Usuarios::find($id);
      $usuario->modificado_en = date('Y-m-d H:i:s');

      $usuario->borrado_logico = 1;

      if($usuario->save()){
          $return['exito'] = true;
        }else{
            $return['exito'] = false;
        }
        
        return response()->json($return);

    }

    public function forgotPassword(Request $request) {
       $consulta='SELECT u.id AS id,
                          u.username AS username,
                          pd.email AS email,
                          pd.nombres AS nombres
                   FROM usuarios AS u
                   INNER JOIN person_data AS pd ON pd.id = u.person_data_id
                   WHERE username="'.$request->input('usuario_username').'"
                   AND email="'.$request->input('usuario_email').'"
                   LIMIT 1';
         /* echo $consulta;*/
        $result= \DB::select($consulta);
        if (count($result)==0) {
          $resultado['exito'] = false;
          $resultado['msg'] = "El usuario y email no concuerdan";
        } elseif (count($result)==1) {
          $usuarioid = $result[0]->id;
          //genero nueva contraseña
          $newpassword = $this->crearNuevaPassword(random_int(8, 12));

          //modifico db
          $usuario = Usuarios::find($usuarioid);
          $usuario->modificado_en = date('Y-m-d H:i:s');
          $usuario->password = $newpassword;
          $usuario->save();

          //Preparo y envio mail

          $headers  = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
          $headers .= "From: Sudestevende <groupcelit@gmail.com>"."\r\n";
          $headers .= "Reply-To: groupcelit@gmail.com\r\n";
          $headers .= "X-Mailer: PHP/" . phpversion();
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

          // write the email content
          $email_content = "Nombre   : ".$result[0]->username." \r\n";
          $email_content .= "Email   : asdfdsafa\vsdfsd\r\n";
          $email_content .= "Mensaje : Hola Mundoversion  3\r\n\n";

          $message = '<html><body>';
          $message .= '<h1>Hola '.$result[0]->nombres.'!</h1>';
          $message .= '<p>Recientemente requeriste cambiar tu contraseña para tu cuenta de Sudestevende.</p>';
          $message .= '<h3>Tu nueva contraseña es: '.$newpassword.' </h3>';
          $message .= '<p>Recomendamos cambiar la contraseña a una de tu agrado.</p>';
          $message .= '<p>Si no requeriste un cambio de contraseña por favor ignora este email o notificanos del error.</p>';
          $message .= '<p>Gracias,</p>';
          $message .= '<h4>Group-Celit</h4>';
          $message .= '</body></html>';
          // send the email
          
          if(mail($result[0]->email,'Sudestevende' , $message, $headers)) {
            $resultado['exito'] = true;
            $resultado['msg'] = "Se ha enviado una nueva contraseña a su mail";
          } else {
            $resultado['exito'] = false;
            $resultado['msg'] = "Ocurrio un error al enviar el mail";
          }
        } else {
          $resultado['exito'] = false;
          $resultado['msg'] = "Ops ocurrio un error inesperado";
        }
      
        return $resultado;
    }

    private function crearNuevaPassword($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            return $str;
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

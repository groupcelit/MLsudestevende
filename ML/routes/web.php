<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$app->get('/lumen-version', function () use ($app) {
    /*$id = $app['encrypter']->decrypt($_COOKIE[$app['config']['session.cookie']]);
    $app['session']->driver()->setId($id);
    $app['session']->driver()->start();*/
    session_name('private');
    session_start();
    $private_id = session_id();
    session_write_close();

  // return $app->version();
    return $private_id;
});
/*Todo VISTAS*/
    /*Principal*/
    $app->get('/bienvenido', function ()  {
        $anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('home', ['anuncios' => $anuncios]);
    });
    $app->get('/', function ()  {
        $anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('home', ['anuncios' => $anuncios]);
    });

    /*auth*/
    $app->get('/ingresar', function ()  {
        //$anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('auth.form_login');
    });
   /* $app->get('/salir', function ()  {
        //$anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('auth.form_alta_usuario');
    });*/
    $app->get('/registrandome', function ()  {
        //$anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('auth.form_alta_usuario');
    });
    $app->get('/editandome', function ()  {
        //$anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('auth.form_editar_usuario');
    });

    /*publicaciones*/
    $app->get('/vender', function ()  {
        $categorias=app('App\Http\Controllers\CategoriasController')->getCategorias();
        return view('publicaciones.form_alta_producto',['categorias' => $categorias]);
    });


$app->get('/usuarios', function () use ($app) {
   $results = DB::select("SELECT * FROM anuncios LIMIT 20");
   echo '<pre>';
   return var_dump($results);
   //return $app->version();
});

/*Todo CONTROLLER*/
    /*USUARIO-PERSONA*/
        /*Crear usuario-persona*/
        $app->post('/usuarios/new_user','UsuariosController@saveUsuario');

        /*Actualizar usuario-persona*/
        $app->put('/usuarios/update_user/{id}','UsuariosController@saveUsuario');

        /*Logearse*/
        $app->post('/usuarios/login','UsuariosController@postLogin');

    /*ANUNCIOS*/
        /*MOSTRAR LISTA DE ANUNCIOS*/
        $app->get('/anuncios/show','AnunciosController@getShow');



//CREATE Anuncios
$app->post('/anuncios/new_anuncio', function (Request $request) use ($app) {
     /* $new_anuncio=New Anuncios();
      $new_anuncio->usuario_id=$request->input('name');;
      $new_anuncio->createdEn=date('Y-m-d H:i:s');*/
    
   
   /*if($new_anuncio->save()){
      return response()->json($new_anuncio);
   }else{
      return response()->json("error");
   }*/

   //return $app->version();
});

$app->extend("session",function($obj)use($app){
    $app->configure("session");
    return $obj;
});
$app->alias("session",\Illuminate\Session\SessionManager::class);
$app->register(\Illuminate\Session\SessionServiceProvider::class);
$app->middleware([
    \Illuminate\Session\Middleware\StartSession::class
]);


/*$app->post('/usuarios', function () {
   //
});*/
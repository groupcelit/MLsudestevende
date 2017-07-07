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
     // return $app->version();
  /*  $usuario=app('App\Http\Controllers\UsuariosController')->getSession();*/

    return url();
});
/*Todo VISTAS*/
    /*Home*/
    $app->get('/bienvenido', function ()  {
        $anuncios=app('App\Http\Controllers\AnunciosController')->getShow(false);
        return view('home', ['anuncios' => $anuncios]);
    });
    $app->get('/', function ()  {
        $anuncios=app('App\Http\Controllers\AnunciosController')->getShow(false);
        return view('home', ['anuncios' => $anuncios]);
    });


    /*Auth*/
    $app->get('/ingresar', function ()  {
        //$anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
        return view('auth.form_login');
    });
    $app->get('/salir', function ()  {
        app('App\Http\Controllers\UsuariosController')->destroySession();
        return redirect('/');
    });

    /*Usuario*/
    $app->get('/registrandome', function ()  {
        return view('auth.form_alta_usuario');
    });

    $app->get('/editandome', function ()  {
        if(isset($_SESSION['key']) && $_SESSION['key']>0) {
            $person_data=app('App\Http\Controllers\UsuariosController')->getDataPersona();
            return view('auth.form_editar_usuario', ['person_data' => $person_data]);
        }else{
            return view('auth.form_login');
        }
    });



    $app->get('/template','AnunciosController@setTestTemplate');

    /*publicaciones*/
        $app->get('/vender', function ()  {
            if(isset($_SESSION['key']) && $_SESSION['key']>0) {
                $categorias = app('App\Http\Controllers\CategoriasController')->getCategorias();
                $sub_categorias = app('App\Http\Controllers\SubCategoriasController')->getSubCategorias($categorias[0]);
                return view('publicaciones.form_alta_producto', ['categorias' => $categorias, 'sub_categorias' => $sub_categorias]);
             }else{
                return view('auth.form_login');
            }
        });

        $app->get('/mis_anuncios', function ()  {
            if(isset($_SESSION['key']) && $_SESSION['key']>0) {
                $anuncios = app('App\Http\Controllers\AnunciosController')->getShow(true);
                return view('publicaciones.anuncios_usuario', ['anuncios' => $anuncios]);
             }else{
                return view('auth.form_login');
            }  
        });
    /*BUSQUEDAS*/
        $app->get('/search',['uses' => 'AnunciosController@getSearch','as' => 'search']);

    
    /*$app->get('/usuarios', function () use ($app) {
       $results = DB::select("SELECT * FROM anuncios LIMIT 20");
       echo '<pre>';
       return var_dump($results);
    });*/

/*Todo CONTROLLER*/
    /*USUARIO-PERSONA*/
        /*Crear usuario-persona*/
        $app->post('/usuarios/new_user','UsuariosController@saveUsuario');

        /*Actualizar usuario-persona*/
        $app->put('/usuarios/update_user','UsuariosController@saveUsuario');

        /*Logearse*/
        $app->post('/usuarios/login','UsuariosController@postLogin');
        /*salir*/

    /*ANUNCIOS*/
        /*MOSTRAR LISTA DE ANUNCIOS*/
        $app->get('/anuncios/show','AnunciosController@getShow');
        //Crear Anuncios
        $app->post('/anuncios/new_anuncio', 'AnunciosController@setAnuncio');
        $app->post('/anuncios/enviar', 'AnunciosController@setAnuncio');
        /*aside*/
        $app->get('/q/{codigo}','AnunciosController@getAnuncioCodigo');
/*CATEGORIAS*/
        $app->get('/categorias/getCategorias','CategoriasController@getCategoriasSubcaterias');


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
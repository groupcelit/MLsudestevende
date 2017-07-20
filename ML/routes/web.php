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


$app->get('/p/{path}', function ($path) {
    // devuelve el path storage_path('contenido_anuncios/anuncio.blade.php');
    return view('contenido_anuncios.p.'.$path);
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

    $anuncios=app('App\Http\Controllers\AnunciosController')->getShow(false);

/*Auth*/
    $app->get('/ingresar', function ()  {
        return view('auth.form_login');
    });
    /*salir*/
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

    /*Administrador*/
    $app->get('/admin/usuarios',function ()  {
        if(isset($_SESSION['login']) && $_SESSION['keyword']=="admin_celit" ) {
            $usuarios_data=app('App\Http\Controllers\UsuariosController')->getUserDataAdmin();
            return view('admin.usuarios_list_admin', ['usuarios_data' => $usuarios_data]);
        } else{
            return redirect('/');
        }
    });
    $app->get('/admin/anuncios',function ()  {
        if(isset($_SESSION['login']) && $_SESSION['keyword']=="admin_celit" ) {
            $anuncios=app('App\Http\Controllers\AnunciosController')->getShowAdmin();
            return view('admin.anuncios_list_admin', ['anuncios' => $anuncios]);
        } else{
            return redirect('/');
        }
    });
    $app->put('/usuarios_admin/delete_user_admin',function (Request $request)  {
        if(isset($_SESSION['login']) && $_SESSION['keyword']=="admin_celit" ) {
            $consulta = app('App\Http\Controllers\UsuariosController')->deleteUsuarioAdmin($request->input('user'));
            return $consulta;
        } else{
            return redirect('/');
        }
    });
    $app->put('/usuarios_admin/update_premium',function (Request $request) {
        if(isset($_SESSION['login']) && $_SESSION['keyword']=="admin_celit" ) {
            $premium = app('App\Http\Controllers\UsuariosController')->updatePremiumUsuario($request->input('id'));
            return $premium;
        } else{
            return redirect('/');
        }
    });
    $app->put('/anuncios_admin/update_activo',function (Request $request) {
        if(isset($_SESSION['login']) && $_SESSION['keyword']=="admin_celit" ) {
            $premium = app('App\Http\Controllers\AnunciosController')->updateActivoAnuncio($request->input('id'));
            return $premium;
        } else{
            return redirect('/');
        }
    });

    /*publicaciones*/
        $app->get('/vender', function ()  {
            if(isset($_SESSION['key']) && $_SESSION['key']>0) {
                $categorias = app('App\Http\Controllers\CategoriasController')->getCategorias();
                
                return view('publicaciones.form_alta_producto', ['categorias' => $categorias]);
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

        $app->get('/anuncios/editar_anuncio/{id}', function ($id)  {
            if(isset($_SESSION['key']) && $_SESSION['key']>0) {                
                $anuncio = app('App\Http\Controllers\AnunciosController')->getAnuncioInfoById($id);
                $categorias = app('App\Http\Controllers\CategoriasController')->getCategorias();
                return view('publicaciones.form_editar_anuncio', ['anuncio'    => $anuncio  ,
                                                                  'categorias' => $categorias]);
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

        /*Confirmar usuario unico*/
        $app->get('/usuarios/confirmar_usuario_unico','UsuariosController@confirmUsuario');
        /*Confirmar email unico*/
        $app->get('/usuarios/confirmar_email_unico','UsuariosController@confirmEmail');


        /*Olvido contraseña*/
        $app->get('/olvide_contrasenia',function() {
                return view('auth.form_forgot_password');
        });
        $app->get('/usuarios/forgot_password', 'UsuariosController@forgotPassword');


    /*ANUNCIOS*/
        /*MOSTRAR LISTA DE ANUNCIOS*/
        $app->get('/anuncios/show','AnunciosController@getShow');
        //Crear Anuncios
        $app->post('/anuncios/new_anuncio', 'AnunciosController@setAnuncio');
        $app->post('/anuncios/edit_anuncio', 'AnunciosController@editAnuncio');
        $app->post('/anuncios/enviar', 'AnunciosController@setAnuncio');
        /*aside*/
        $app->get('/q/{codigo}','AnunciosController@getAnuncioCodigo');
/*CATEGORIAS*/         
        $app->post('/subcategorias/getSubCategorias','SubCategoriasController@getSubCategorias');

        $app->get('/template','AnunciosController@setTestTemplate');

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
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
   return $app->version();
});

$app->get('/', function ()  {
    $anuncios=app('App\Http\Controllers\AnunciosController')->getShow();
    return view('home', ['anuncios' => $anuncios]);
});

$app->get('/usuarios', function () use ($app) {
   $results = DB::select("SELECT * FROM anuncios LIMIT 20");
   echo '<pre>';
   return var_dump($results);
   //return $app->version();
});

/*TODO USUARIO-PERSONA*/
    /*CREAR USUARIO-PERSONA*/
    $app->post('/usuarios/new_user','UsuariosController@saveUsuario');

    /*Actualizar USUARIO-PERSONA*/
    $app->put('/usuarios/update_user/{id}','UsuariosController@saveUsuario');

/*TODO ANUNCIOS*/
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



/*$app->post('/usuarios', function () {
   //
});*/
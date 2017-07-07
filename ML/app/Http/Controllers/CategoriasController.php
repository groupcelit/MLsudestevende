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
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


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
    public function getCategorias(){
        $consulta="SELECT id,
                          nombre
                   FROM categorias AS c                  
                   WHERE c.borrado_logico=0";
        $categorias= \DB::select($consulta);
        
        return $categorias;
        
       //$categorias= Categorias::where('borrado_logico', '=', 0)->get();    
    }
    
    public function getCategoriasSubcaterias(){
        $categorias = Categorias::all()->toArray();
        foreach ($categorias as $categoria){
            $consulta="SELECT id ,
                              nombre ,
                              codigo
                   FROM sub_categorias AS sc                  
                   WHERE sc.borrado_logico=0
                   AND sc.categoria_id =".$categoria['id'];
            $subcategorias= \DB::select($consulta);
            //$subcategorias = SubCategorias::where('categoria_id','=',$categoria['id']);

            $categoria['subcategorias']=$subcategorias;

            //return $categoria;
        }



    }
    
}

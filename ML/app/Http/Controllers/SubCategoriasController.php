<?php
/**
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 29/06/2017
 * Time: 09:41 AM
 */
namespace App\Http\Controllers;
/*Recursos a usar*/
use App\Models\SubCategorias;
/*Recursos necesarios*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class SubCategoriasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {


    }*/
    public function getSubCategorias(Request $request){
        $categoria=$request->input('categoria_id');

        $consulta="SELECT id,
                          nombre
                   FROM sub_categorias AS sc                 
                   WHERE sc.borrado_logico=0
                   AND categoria_id ='".$categoria."'";
        $sub_categorias= \DB::select($consulta);

        return $sub_categorias;

        //$categorias= Categorias::where('borrado_logico', '=', 0)->get();
    }

}

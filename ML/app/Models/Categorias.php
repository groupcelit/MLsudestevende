<?php
/**
 * Created by PhpStorm.
 * User: Jlaupa
 * Date: 01/07/2017
 * Time: 09:26 AM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string nombre
 * @property string codigo
 * @property \DateTime creado_en
 * @property \DateTime $modificado_en
 * @property boolean $borrado_logico
 */

class Categorias extends Model{
    protected $guarded = ['id'];
}


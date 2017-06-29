<?php

/**
 * Created by PhpStorm.
 * User: jlaupa
 * Date: 27/06/2017
 * Time: 08:20 AM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int id
 * @property int usuario_id
 * @property string nombre
 * @property string descripcion
 * @property string codigo
 * @property int precio
 * @property int descuento
 * @property int stock
 * @property bool nuevo
 * @property bool destacado
 * @property int subcategoria_id
 * @property \DateTime creado_en
 * @property \DateTime modificado_en
 * @property bool borrado_logico
 */

class Anuncios extends Model{
    protected $guarded = ['id'];
}
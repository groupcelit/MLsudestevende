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
 * @property int anuncio_id
 * @property bool principal
 * @property string path
 * @property string codigo
 * @property \DateTime creado_en
 * @property \DateTime modificado_en
 * @property bool borrado_logico
 */

class Fotos extends Model{
    public $timestamps = false;
    protected $guarded = ['id'];
}
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
 * @property int person_data_id
 * @property string username
 * @property string password
 * @property bool premium
 * @property string codigo
 * @property \DateTime creado_en
 * @property \DateTime modificado_en
 * @property bool borrado_logico
 */
class Usuarios extends Model{
     public $timestamps=false;
     protected $guarded = ['id'];

}
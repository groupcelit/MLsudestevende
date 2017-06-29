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
 * @property string apellidos
 * @property string nombres
 * @property string direccion
 * @property string email
 * @property int celular
 * @property int celular_codigo
 * @property bool borrado_logico
 * @property \DateTime fecha_nacimiento
 * @property \DateTime creado_en
 * @property \DateTime modificado_en
  */
class Persondata extends Model{
    protected $table = 'person_data';
    public $timestamps = false;
    
    protected $guarded = ['id'];

}
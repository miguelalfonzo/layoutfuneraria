<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolModel extends Model
{
    protected $table = 'rol';
	protected $primaryKey = 'Rol_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'rol.Rol_Codigo',
			'rol.Rol_Nombre'
		)
		->get();
		return $result;
	}
	public static function showOne($Rol_Codigo) {
		$result = self::select(
			'rol.Rol_Codigo',
			'rol.Rol_Nombre'
		)
		->where('rol.Rol_Codigo',$Rol_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Rol_Codigo) {
		$entity = self::where('Rol_Codigo', $Rol_Codigo)->first();
		return $entity;
	}
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DepartamentoModel extends Model
{
    protected $table = 'departamento';
	protected $primaryKey = 'Dep_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('pais', 'departamento.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->select(
			'departamento.Dep_Codigo',
			'departamento.Dep_Descripcion',
			'departamento.Dep_Estado',
			'departamento.Pais_Codigo',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when departamento.Dep_Estado = '0' then 'Desactivo'
					when departamento.Dep_Estado = '1' then 'Activo'
				end Dep_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Dep_Codigo) {
		$result = self::join('pais', 'departamento.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->select(
			'departamento.Dep_Codigo',
			'departamento.Dep_Descripcion',
			'departamento.Dep_Estado',
			'departamento.Pais_Codigo',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when departamento.Dep_Estado = '0' then 'Desactivo'
					when departamento.Dep_Estado = '1' then 'Activo'
				end Dep_Estado_Texto
				"
			)
		)
		->where('departamento.Dep_Codigo',$Dep_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Dep_Codigo) {
		$entity = self::where('Dep_Codigo', $Dep_Codigo)->first();
		return $entity;
	}
}

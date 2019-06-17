<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProvinciaModel extends Model
{
    protected $table = 'provincia';
	protected $primaryKey = 'Prov_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('pais', 'provincia.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'provincia.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->select(
			'provincia.Prov_Codigo',
			'provincia.Prov_Descripcion',
			'provincia.Prov_Estado',
			'provincia.Dep_Codigo',
			'provincia.Pais_Codigo',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when provincia.Prov_Estado = '0' then 'Desactivo'
					when provincia.Prov_Estado = '1' then 'Activo'
				end Prov_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Prov_Codigo) {
		$result = self::join('pais', 'provincia.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'provincia.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->select(
			'provincia.Prov_Codigo',
			'provincia.Prov_Descripcion',
			'provincia.Prov_Estado',
			'provincia.Dep_Codigo',
			'provincia.Pais_Codigo',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when provincia.Prov_Estado = '0' then 'Desactivo'
					when provincia.Prov_Estado = '1' then 'Activo'
				end Prov_Estado_Texto
				"
			)
		)
		->where('provincia.Prov_Codigo',$Prov_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Prov_Codigo) {
		$entity = self::where('Prov_Codigo', $Prov_Codigo)->first();
		return $entity;
	}
}

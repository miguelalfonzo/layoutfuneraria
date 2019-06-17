<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DistritoModel extends Model
{
    protected $table = 'distrito';
	protected $primaryKey = 'Dist_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('pais', 'distrito.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'distrito.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'distrito.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->select(
			'distrito.Dist_Codigo',
			'distrito.Dist_Descripcion',
			'distrito.Dist_Estado',
			'distrito.Prov_Codigo',
			'distrito.Dep_Codigo',
			'distrito.Pais_Codigo',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when distrito.Dist_Estado = '0' then 'Desactivo'
					when distrito.Dist_Estado = '1' then 'Activo'
				end Dist_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Dist_Codigo) {
		$result = self::join('pais', 'distrito.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'distrito.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'distrito.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->select(
			'distrito.Dist_Codigo',
			'distrito.Dist_Descripcion',
			'distrito.Dist_Estado',
			'distrito.Prov_Codigo',
			'distrito.Dep_Codigo',
			'distrito.Pais_Codigo',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when distrito.Dist_Estado = '0' then 'Desactivo'
					when distrito.Dist_Estado = '1' then 'Activo'
				end Dist_Estado_Texto
				"
			)
		)
		->where('distrito.Dist_Codigo',$Dist_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Dist_Codigo) {
		$entity = self::where('Dist_Codigo', $Dist_Codigo)->first();
		return $entity;
	}
}

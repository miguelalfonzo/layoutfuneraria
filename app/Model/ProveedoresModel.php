<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProveedoresModel extends Model
{
    protected $table = 'proveedores';
	protected $primaryKey = 'Prov_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('pais', 'proveedores.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'proveedores.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'proveedores.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->join('distrito', 'proveedores.Dist_Codigo', '=', 'distrito.Dist_Codigo')
		->select(
			'proveedores.Prov_Codigo',
			'proveedores.Prov_Fecha',
			'proveedores.Prov_Tipo',
			'proveedores.Prov_Ruc',
			'proveedores.Prov_Razon_Social',
			'proveedores.Prov_Direccion',
			'proveedores.Prov_TeleFijo',
			'proveedores.Prov_Celular',
			'proveedores.Prov_Email',
			'proveedores.Prov_Estado',
			'proveedores.Dist_Codigo',
			'proveedores.Provi_Codigo',
			'proveedores.Dep_Codigo',
			'proveedores.Pais_Codigo',
			'distrito.Dist_Descripcion',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when proveedores.Prov_Estado = '2' then 'Inactivo'
					when proveedores.Prov_Estado = '1' then 'Activo'
				end Dist_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Prov_Codigo) {
		$result = self::join('pais', 'proveedores.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'proveedores.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'proveedores.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->join('distrito', 'proveedores.Dist_Codigo', '=', 'distrito.Dist_Codigo')
		->select(
			'proveedores.Prov_Codigo',
			'proveedores.Prov_Fecha',
			'proveedores.Prov_Tipo',
			'proveedores.Prov_Ruc',
			'proveedores.Prov_Razon_Social',
			'proveedores.Prov_Direccion',
			'proveedores.Prov_TeleFijo',
			'proveedores.Prov_Celular',
			'proveedores.Prov_Email',
			'proveedores.Prov_Estado',
			'proveedores.Dist_Codigo',
			'proveedores.Provi_Codigo',
			'proveedores.Dep_Codigo',
			'proveedores.Pais_Codigo',
			'distrito.Dist_Descripcion',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			DB::raw(
				"
				case
					when proveedores.Prov_Estado = '2' then 'Inactivo'
					when proveedores.Prov_Estado = '1' then 'Activo'
				end Prov_Estado_Texto,
				case
					when proveedores.Prov_Tipo = '2' then 'Natural'
					when proveedores.Prov_Tipo = '1' then 'Juridico'
				end Prov_Tipo_Texto
				"
			)
		)
		->where('proveedores.Prov_Codigo',$Prov_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Prov_Codigo) {
		$entity = self::where('Prov_Codigo', $Prov_Codigo)->first();
		return $entity;
	}
}

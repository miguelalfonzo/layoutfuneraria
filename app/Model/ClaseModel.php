<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClaseModel extends Model
{
    protected $table = 'clase';
	protected $primaryKey = 'Cla_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('grupo', 'clase.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->select(
			'clase.Cla_Codigo',
			'clase.Cla_Descripcion',
			'clase.Cla_Estado',
			'clase.Grupo_Gru_Codigo',
			'grupo.Gru_Descripcion',
			DB::raw(
				"
				case
					when clase.Cla_Estado = '0' then 'Desactivo'
					when clase.Cla_Estado = '1' then 'Activo'
				end Cla_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Cla_Codigo) {
		$result = self::join('grupo', 'clase.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->select(
			'clase.Cla_Codigo',
			'clase.Cla_Descripcion',
			'clase.Cla_Estado',
			'clase.Grupo_Gru_Codigo',
			'grupo.Gru_Descripcion',
			DB::raw(
				"
				case
					when clase.Cla_Estado = '0' then 'Desactivo'
					when clase.Cla_Estado = '1' then 'Activo'
				end Cla_Estado_Texto
				"
			)
		)
		->where('clase.Cla_Codigo',$Cla_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Cla_Codigo) {
		$entity = self::where('Cla_Codigo', $Cla_Codigo)->first();
		return $entity;
	}
}

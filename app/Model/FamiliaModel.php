<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FamiliaModel extends Model
{
    protected $table = 'familia';
	protected $primaryKey = 'Fam_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('grupo', 'familia.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->join('clase', 'familia.Clase_Cla_Codigo', '=', 'clase.Cla_Codigo')
		->select(
			'familia.Fam_Codigo',
			'familia.Fam_Descripcion',
			'familia.Fam_Estado',
			'familia.Clase_Cla_Codigo',
			'familia.Grupo_Gru_Codigo',
			'grupo.Gru_Descripcion',
			'clase.Cla_Descripcion',
			DB::raw(
				"
				case
					when familia.Fam_Estado = '0' then 'Desactivo'
					when familia.Fam_Estado = '1' then 'Activo'
				end Fam_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Fam_Codigo) {
		$result = self::join('grupo', 'familia.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->join('clase', 'familia.Clase_Cla_Codigo', '=', 'clase.Cla_Codigo')
		->select(
			'familia.Fam_Codigo',
			'familia.Fam_Descripcion',
			'familia.Fam_Estado',
			'familia.Clase_Cla_Codigo',
			'familia.Grupo_Gru_Codigo',
			'grupo.Gru_Descripcion',
			'clase.Cla_Descripcion',
			DB::raw(
				"
				case
					when familia.Fam_Estado = '0' then 'Desactivo'
					when familia.Fam_Estado = '1' then 'Activo'
				end Fam_Estado_Texto
				"
			)
		)
		->where('familia.Fam_Codigo',$Fam_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Fam_Codigo) {
		$entity = self::where('Fam_Codigo', $Fam_Codigo)->first();
		return $entity;
	}
}

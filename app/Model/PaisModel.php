<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaisModel extends Model
{
    protected $table = 'pais';
	protected $primaryKey = 'Pais_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'pais.Pais_Codigo',
			'pais.Pais_Descripcion',
			'pais.Pais_Estado',
			DB::raw(
				"
				case
					when pais.Pais_Estado = '0' then 'Desactivo'
					when pais.Pais_Estado = '1' then 'Activo'
				end Pais_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Pais_Codigo) {
		$result = self::select(
			'pais.Pais_Codigo',
			'pais.Pais_Descripcion',
			'pais.Pais_Estado',
			DB::raw(
				"
				case
					when pais.Pais_Estado = '0' then 'Desactivo'
					when pais.Pais_Estado = '1' then 'Activo'
				end Pais_Estado_Texto
				"
			)
		)
		->where('pais.Pais_Codigo',$Pais_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Pais_Codigo) {
		$entity = self::where('Pais_Codigo', $Pais_Codigo)->first();
		return $entity;
	}
}

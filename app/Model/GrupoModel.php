<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GrupoModel extends Model
{
    protected $table = 'grupo';
	protected $primaryKey = 'Gru_Codigo';
	protected $keyType = 'string';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'grupo.Gru_Codigo',
			'grupo.Gru_Descripcion',
			'grupo.Gru_Estado'
		)
		->get();
		return $result;
	}
	public static function showOne($Gru_Codigo) {
		$result = self::select(
			'grupo.Gru_Codigo',
			'grupo.Gru_Descripcion',
			'grupo.Gru_Estado'
		)
		->where('grupo.Gru_Codigo',$Gru_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Gru_Codigo) {
		$entity = self::where('Gru_Codigo', $Gru_Codigo)->first();
		return $entity;
	}
}

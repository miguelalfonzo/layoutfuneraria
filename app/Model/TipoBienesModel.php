<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoBienesModel extends Model
{
    protected $table = 'tipo_bienes';
	protected $primaryKey = 'TBien_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'tipo_bienes.TBien_Codigo',
			'tipo_bienes.TBien_Descripcion',
			'tipo_bienes.TBien_Estado'
		)
		->get();
		return $result;
	}
	public static function showOne($TBien_Codigo) {
		$result = self::select(
			'tipo_bienes.TBien_Codigo',
			'tipo_bienes.TBien_Descripcion',
			'tipo_bienes.TBien_Estado'
		)
		->where('tipo_bienes.TBien_Codigo',$TBien_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($TBien_Codigo) {
		$entity = self::where('TBien_Codigo', $TBien_Codigo)->first();
		return $entity;
	}
}

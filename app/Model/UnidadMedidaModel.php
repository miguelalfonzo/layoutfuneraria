<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnidadMedidaModel extends Model
{
    protected $table = 'unidad_medida';
	protected $primaryKey = 'UMed_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'unidad_medida.UMed_Codigo',
			'unidad_medida.UMed_Descripcion',
			'unidad_medida.UMed_Estado'
		)
		->get();
		return $result;
	}
	public static function showOne($UMed_Codigo) {
		$result = self::select(
			'unidad_medida.UMed_Codigo',
			'unidad_medida.UMed_Descripcion',
			'unidad_medida.UMed_Estado'
		)
		->where('unidad_medida.UMed_Codigo',$UMed_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($UMed_Codigo) {
		$entity = self::where('UMed_Codigo', $UMed_Codigo)->first();
		return $entity;
	}
}

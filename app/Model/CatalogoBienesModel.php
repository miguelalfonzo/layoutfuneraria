<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CatalogoBienesModel extends Model
{
    protected $table = 'catalogo_bienes';
	protected $primaryKey = 'Art_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('grupo', 'catalogo_bienes.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->join('clase', 'catalogo_bienes.Clase_Cla_Codigo', '=', 'clase.Cla_Codigo')
		->join('familia', 'catalogo_bienes.Familia_Fam_Codigo', '=', 'familia.Fam_Codigo')
		->join('unidad_medida', 'catalogo_bienes.Unidad_Medida_UMed_Codigo', '=', 'unidad_medida.UMed_Codigo')
		->join('tipo_bienes', 'catalogo_bienes.Tipo_Bienes_TBien_Codigo', '=', 'tipo_bienes.TBien_Codigo')
		->select(
			'catalogo_bienes.Art_Codigo',
			'catalogo_bienes.Art_Descripcion',
			'catalogo_bienes.Art_Precio_Ref',
			'catalogo_bienes.Centro_Gasto',
			'catalogo_bienes.Cuenta_Ingreso',
			'catalogo_bienes.Cuenta_Gasto',
			'catalogo_bienes.Art_Estado',
			'catalogo_bienes.Unidad_Medida_UMed_Codigo',
			'catalogo_bienes.Tipo_Bienes_TBien_Codigo',
			'catalogo_bienes.Grupo_Gru_Codigo',
			'catalogo_bienes.Clase_Cla_Codigo',
			'catalogo_bienes.Familia_Fam_Codigo',
			'catalogo_bienes.Clasificador_Gasto',
			'grupo.Gru_Descripcion',
			'clase.Cla_Descripcion',
			'familia.Fam_Descripcion',
			'unidad_medida.UMed_Descripcion',
			'tipo_bienes.TBien_Descripcion',
			DB::raw(
				"
				case
					when catalogo_bienes.Art_Estado = '0' then 'Desactivo'
					when catalogo_bienes.Art_Estado = '1' then 'Activo'
				end Art_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Art_Codigo) {
		$result = self::join('grupo', 'catalogo_bienes.Grupo_Gru_Codigo', '=', 'grupo.Gru_Codigo')
		->join('clase', 'catalogo_bienes.Clase_Cla_Codigo', '=', 'clase.Cla_Codigo')
		->join('familia', 'catalogo_bienes.Familia_Fam_Codigo', '=', 'familia.Fam_Codigo')
		->join('unidad_medida', 'catalogo_bienes.Unidad_Medida_UMed_Codigo', '=', 'unidad_medida.UMed_Codigo')
		->join('tipo_bienes', 'catalogo_bienes.Tipo_Bienes_TBien_Codigo', '=', 'tipo_bienes.TBien_Codigo')
		->select(
			'catalogo_bienes.Art_Codigo',
			'catalogo_bienes.Art_Descripcion',
			'catalogo_bienes.Art_Precio_Ref',
			'catalogo_bienes.Centro_Gasto',
			'catalogo_bienes.Cuenta_Ingreso',
			'catalogo_bienes.Cuenta_Gasto',
			'catalogo_bienes.Art_Estado',
			'catalogo_bienes.Unidad_Medida_UMed_Codigo',
			'catalogo_bienes.Tipo_Bienes_TBien_Codigo',
			'catalogo_bienes.Grupo_Gru_Codigo',
			'catalogo_bienes.Clase_Cla_Codigo',
			'catalogo_bienes.Familia_Fam_Codigo',
			'catalogo_bienes.Clasificador_Gasto',
			'grupo.Gru_Descripcion',
			'clase.Cla_Descripcion',
			'familia.Fam_Descripcion',
			'unidad_medida.UMed_Descripcion',
			'tipo_bienes.TBien_Descripcion',
			DB::raw(
				"
				case
					when catalogo_bienes.Art_Estado = '0' then 'Desactivo'
					when catalogo_bienes.Art_Estado = '1' then 'Activo'
				end Art_Estado_Texto
				"
			)
		)
		->where('catalogo_bienes.Art_Codigo',$Art_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Art_Codigo) {
		$entity = self::where('Art_Codigo', $Art_Codigo)->first();
		return $entity;
	}
}

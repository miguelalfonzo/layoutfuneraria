<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoDocumentoModel extends Model
{
    protected $table = 'tipo_documento';
	protected $primaryKey = 'Tdoc_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::select(
			'tipo_documento.Tdoc_Codigo',
			'tipo_documento.Tdoc_Descripcion',
			'tipo_documento.Tdoc_Estado',
			DB::raw(
				"
				case
					when tipo_documento.Tdoc_Estado = '0' then 'Inactivo'
					when tipo_documento.Tdoc_Estado = '1' then 'Activo'
				end Tdoc_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Tdoc_Codigo) {
		$result = self::select(
			'tipo_documento.Tdoc_Codigo',
			'tipo_documento.Tdoc_Descripcion',
			'tipo_documento.Tdoc_Estado',
			DB::raw(
				"
				case
					when tipo_documento.Tdoc_Estado = '0' then 'Inactivo'
					when tipo_documento.Tdoc_Estado = '1' then 'Activo'
				end Tdoc_Estado_Texto
				"
			)
		)
		->where('tipo_documento.Tdoc_Codigo',$Tdoc_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Tdoc_Codigo) {
		$entity = self::where('Tdoc_Codigo', $Tdoc_Codigo)->first();
		return $entity;
	}
}

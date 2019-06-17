<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonaModel extends Model
{
	/* Autor. SYLAR.JM */
    protected $table = 'persona';
	protected $primaryKey = 'Per_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('tipo', 'persona.Tip_Codigo', '=', 'tipo.Tip_Codigo')
		->select(
			'persona.Per_Codigo',
			'persona.Per_Nombre',
			'persona.Per_Apellido',
			'persona.Tip_Codigo',
			'persona.Per_Numerodoc',
			'persona.Per_Direccion',
			'persona.Per_Telmovil',
			'persona.Per_Telfijo',
			'tipo.Tip_Nombre'
		)
		->get();
		return $result;
	}
	public static function showOne($Per_Codigo) {
		$result = self::join('tipo', 'persona.Tip_Codigo', '=', 'tipo.Tip_Codigo')
		->select(
			'persona.Per_Codigo',
			'persona.Per_Nombre',
			'persona.Per_Apellido',
			'persona.Tip_Codigo',
			'persona.Per_Numerodoc',
			'persona.Per_Direccion',
			'persona.Per_Telmovil',
			'persona.Per_Telfijo',
			'tipo.Tip_Nombre'
		)
		->where('persona.Per_Codigo',$Per_Codigo)
		->first();
		return $result;
	}
	public static function showOneByDoc($Tip_Codigo,$Per_Numerodoc) {
		$result = self::join('tipo', 'persona.Tip_Codigo', '=', 'tipo.Tip_Codigo')
		->select(
			'persona.Per_Codigo',
			'persona.Per_Nombre',
			'persona.Per_Apellido',
			'persona.Tip_Codigo',
			'persona.Per_Numerodoc',
			'persona.Per_Direccion',
			'persona.Per_Telmovil',
			'persona.Per_Telfijo',
			'tipo.Tip_Nombre'
		)
		->where('persona.Tip_Codigo',$Tip_Codigo)
		->where('persona.Per_Numerodoc',$Per_Numerodoc)
		->first();
		return $result;
	}
	public static function prepareUpdate($Per_Codigo) {
		$entity = self::where('Per_Codigo', $Per_Codigo)->first();
		return $entity;
	}
}

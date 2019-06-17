<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsuarioModel extends Model
{
	/* Autor. SYLAR.JM */
    protected $table = 'usuario';
	protected $primaryKey = 'Usu_Codigo';
	public $incrementing = false;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('rol', 'usuario.Rol_Codigo', '=', 'rol.Rol_Codigo')
		->join('persona', 'usuario.Usu_Codigo', '=', 'persona.Per_Codigo')
		->join('tipo', 'persona.Tip_Codigo', '=', 'tipo.Tip_Codigo')
		->select(
			'usuario.Usu_Codigo',
			'usuario.Usu_Nombre',
			'usuario.Usu_Estado',
			'usuario.Rol_Codigo',
			'rol.Rol_Nombre',
			'persona.Tip_Codigo',
			'persona.Per_Numerodoc',
			DB::raw(
				"
				case
					when usuario.Usu_Estado = '0' then 'Desactivo'
					when usuario.Usu_Estado = '1' then 'Activo'
				end Usu_Estado_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Usu_Codigo) {
		$result = self::join('rol', 'usuario.Rol_Codigo', '=', 'rol.Rol_Codigo')
		->join('persona', 'usuario.Usu_Codigo', '=', 'persona.Per_Codigo')
		->join('tipo', 'persona.Tip_Codigo', '=', 'tipo.Tip_Codigo')
		->select(
			'usuario.Usu_Codigo',
			'usuario.Usu_Nombre',
			'usuario.Usu_Estado',
			'usuario.Rol_Codigo',
			'rol.Rol_Nombre',
			'persona.Tip_Codigo',
			'persona.Per_Numerodoc',
			DB::raw(
				"
				case
					when usuario.Usu_Estado = '0' then 'Desactivo'
					when usuario.Usu_Estado = '1' then 'Activo'
				end Usu_Estado_Texto
				"
			)
		)
		->where('usuario.Usu_Codigo',$Usu_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Usu_Codigo) {
		$usuario = self::where('Usu_Codigo', $Usu_Codigo)->first();
		return $usuario;
	}
}

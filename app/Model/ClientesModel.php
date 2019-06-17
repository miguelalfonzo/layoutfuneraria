<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClientesModel extends Model
{
    protected $table = 'clientes';
	protected $primaryKey = 'Cli_Codigo';
	public $incrementing = true;
	public $timestamps = false;

	public static function listMany() {
		$result = self::join('pais', 'clientes.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'clientes.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'clientes.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->join('distrito', 'clientes.Dist_Codigo', '=', 'distrito.Dist_Codigo')
		->join('tipo_documento', 'clientes.Tdoc_Codigo', '=', 'tipo_documento.Tdoc_Codigo')
		->select(
			'clientes.Cli_Codigo',
			'clientes.Cli_Tipo_Persona',
			'clientes.Cli_Direccion',
			'clientes.Cli_Email',
			'clientes.Cli_Telefono',
			'clientes.Cli_Estado',
			'clientes.Tdoc_Codigo',
			'clientes.Dist_Codigo',
			'clientes.Prov_Codigo',
			'clientes.Dep_Codigo',
			'clientes.Pais_Codigo',
			'clientes.Cli_Nro_Docu',
			'distrito.Dist_Descripcion',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			'tipo_documento.Tdoc_Descripcion',
			DB::raw(
				"
				case
					when clientes.Cli_Estado = '0' then 'Inactivo'
					when clientes.Cli_Estado = '1' then 'Activo'
				end Cli_Estado_Texto,
				case
					when clientes.Cli_Tipo_Persona = '2' then 'Natural'
					when clientes.Cli_Tipo_Persona = '1' then 'Juridico'
				end Cli_Tipo_Persona_Texto
				"
			)
		)
		->get();
		return $result;
	}
	public static function showOne($Cli_Codigo) {
		$result = self::join('pais', 'clientes.Pais_Codigo', '=', 'pais.Pais_Codigo')
		->join('departamento', 'clientes.Dep_Codigo', '=', 'departamento.Dep_Codigo')
		->join('provincia', 'clientes.Prov_Codigo', '=', 'provincia.Prov_Codigo')
		->join('distrito', 'clientes.Dist_Codigo', '=', 'distrito.Dist_Codigo')
		->join('tipo_documento', 'clientes.Tdoc_Codigo', '=', 'tipo_documento.Tdoc_Codigo')
		->select(
			'clientes.Cli_Codigo',
			'clientes.Cli_Tipo_Persona',
			'clientes.Cli_Direccion',
			'clientes.Cli_Email',
			'clientes.Cli_Telefono',
			'clientes.Cli_Estado',
			'clientes.Tdoc_Codigo',
			'clientes.Dist_Codigo',
			'clientes.Prov_Codigo',
			'clientes.Dep_Codigo',
			'clientes.Pais_Codigo',
			'clientes.Cli_Nro_Docu',
			'distrito.Dist_Descripcion',
			'provincia.Prov_Descripcion',
			'departamento.Dep_Descripcion',
			'pais.Pais_Descripcion',
			'tipo_documento.Tdoc_Descripcion',
			DB::raw(
				"
				case
					when clientes.Cli_Estado = '0' then 'Inactivo'
					when clientes.Cli_Estado = '1' then 'Activo'
				end Cli_Estado_Texto,
				case
					when clientes.Cli_Tipo_Persona = '2' then 'Natural'
					when clientes.Cli_Tipo_Persona = '1' then 'Juridico'
				end Cli_Tipo_Persona_Texto
				"
			)
		)
		->where('clientes.Cli_Codigo',$Cli_Codigo)
		->first();
		return $result;
	}
	public static function prepareUpdate($Cli_Codigo) {
		$entity = self::where('Cli_Codigo', $Cli_Codigo)->first();
		return $entity;
	}
}

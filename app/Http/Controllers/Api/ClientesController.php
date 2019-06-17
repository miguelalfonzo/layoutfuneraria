<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\ClientesModel;
use Illuminate\Support\Facades\Input;

class ClientesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$clientess = ClientesModel::listMany();
		return response($clientess, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Cli_Codigo)
    {
		$clientes = ClientesModel::showOne($Cli_Codigo);
		return response($clientes, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$clientesModel = new ClientesModel;
		// $clientesModel->Cli_Codigo = Input::get('Cli_Codigo');
		$clientesModel->Cli_Tipo_Persona = Input::get('Cli_Tipo_Persona');
		$clientesModel->Cli_Direccion = Input::get('Cli_Direccion');
		$clientesModel->Cli_Email = Input::get('Cli_Email');
		$clientesModel->Cli_Telefono = Input::get('Cli_Telefono');
		$clientesModel->Cli_Estado = Input::get('Cli_Estado');
		$clientesModel->Tdoc_Codigo = Input::get('Tdoc_Codigo');
		$clientesModel->Dist_Codigo = Input::get('Dist_Codigo');
		$clientesModel->Prov_Codigo = Input::get('Prov_Codigo');
		$clientesModel->Dep_Codigo = Input::get('Dep_Codigo');
		$clientesModel->Pais_Codigo = Input::get('Pais_Codigo');
		$clientesModel->Cli_Nro_Docu = Input::get('Cli_Nro_Docu');
		$clientesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Cli_Codigo)
    {
		$clientesModel = ClientesModel::prepareUpdate($Cli_Codigo);
		$clientesModel->Cli_Tipo_Persona = Input::get('Cli_Tipo_Persona');
		$clientesModel->Cli_Direccion = Input::get('Cli_Direccion');
		$clientesModel->Cli_Email = Input::get('Cli_Email');
		$clientesModel->Cli_Telefono = Input::get('Cli_Telefono');
		$clientesModel->Cli_Estado = Input::get('Cli_Estado');
		$clientesModel->Tdoc_Codigo = Input::get('Tdoc_Codigo');
		$clientesModel->Dist_Codigo = Input::get('Dist_Codigo');
		$clientesModel->Prov_Codigo = Input::get('Prov_Codigo');
		$clientesModel->Dep_Codigo = Input::get('Dep_Codigo');
		$clientesModel->Pais_Codigo = Input::get('Pais_Codigo');
		$clientesModel->Cli_Nro_Docu = Input::get('Cli_Nro_Docu');
		$clientesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Cli_Codigo)
    {
		$clientesModel = ClientesModel::find($Cli_Codigo);
		$clientesModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

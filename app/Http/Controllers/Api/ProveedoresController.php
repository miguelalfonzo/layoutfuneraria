<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\ProveedoresModel;
use Illuminate\Support\Facades\Input;

class ProveedoresController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$proveedoress = ProveedoresModel::listMany();
		return response($proveedoress, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Prov_Codigo)
    {
		$proveedores = ProveedoresModel::showOne($Prov_Codigo);
		return response($proveedores, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$proveedoresModel = new ProveedoresModel;
		$proveedoresModel->Prov_Fecha = Input::get('Prov_Fecha');
		$proveedoresModel->Prov_Tipo = Input::get('Prov_Tipo');
		$proveedoresModel->Prov_Ruc = Input::get('Prov_Ruc');
		$proveedoresModel->Prov_Razon_Social = Input::get('Prov_Razon_Social');
		$proveedoresModel->Prov_Direccion = Input::get('Prov_Direccion');
		$proveedoresModel->Prov_TeleFijo = Input::get('Prov_TeleFijo');
		$proveedoresModel->Prov_Celular = Input::get('Prov_Celular');
		$proveedoresModel->Prov_Email = Input::get('Prov_Email');
		$proveedoresModel->Prov_Estado = Input::get('Prov_Estado');
		$proveedoresModel->Dist_Codigo = Input::get('Dist_Codigo');
		$proveedoresModel->Provi_Codigo = Input::get('Provi_Codigo');
		$proveedoresModel->Dep_Codigo = Input::get('Dep_Codigo');
		$proveedoresModel->Pais_Codigo = Input::get('Pais_Codigo');
		$proveedoresModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Prov_Codigo)
    {
		$proveedoresModel = ProveedoresModel::prepareUpdate($Prov_Codigo);
		$proveedoresModel->Prov_Fecha = Input::get('Prov_Fecha');
		$proveedoresModel->Prov_Tipo = Input::get('Prov_Tipo');
		$proveedoresModel->Prov_Ruc = Input::get('Prov_Ruc');
		$proveedoresModel->Prov_Razon_Social = Input::get('Prov_Razon_Social');
		$proveedoresModel->Prov_Direccion = Input::get('Prov_Direccion');
		$proveedoresModel->Prov_TeleFijo = Input::get('Prov_TeleFijo');
		$proveedoresModel->Prov_Celular = Input::get('Prov_Celular');
		$proveedoresModel->Prov_Email = Input::get('Prov_Email');
		$proveedoresModel->Prov_Estado = Input::get('Prov_Estado');
		$proveedoresModel->Dist_Codigo = Input::get('Dist_Codigo');
		$proveedoresModel->Provi_Codigo = Input::get('Provi_Codigo');
		$proveedoresModel->Dep_Codigo = Input::get('Dep_Codigo');
		$proveedoresModel->Pais_Codigo = Input::get('Pais_Codigo');
		$proveedoresModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Prov_Codigo)
    {
		$proveedoresModel = ProveedoresModel::find($Prov_Codigo);
		$proveedoresModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

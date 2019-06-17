<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\ProvinciaModel;
use Illuminate\Support\Facades\Input;

class ProvinciaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$provincias = ProvinciaModel::listMany();
		return response($provincias, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Prov_Codigo)
    {
		$provincia = ProvinciaModel::showOne($Prov_Codigo);
		return response($provincia, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$provinciaModel = new ProvinciaModel;
		$provinciaModel->Prov_Codigo = Input::get('Prov_Codigo');
		$provinciaModel->Prov_Descripcion = Input::get('Prov_Descripcion');
		$provinciaModel->Prov_Estado = Input::get('Prov_Estado');
		$provinciaModel->Dep_Codigo = Input::get('Dep_Codigo');
		$provinciaModel->Pais_Codigo = Input::get('Pais_Codigo');
		$provinciaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Prov_Codigo)
    {
		$provinciaModel = ProvinciaModel::prepareUpdate($Prov_Codigo);
		$provinciaModel->Prov_Descripcion = Input::get('Prov_Descripcion');
		$provinciaModel->Prov_Estado = Input::get('Prov_Estado');
		$provinciaModel->Dep_Codigo = Input::get('Dep_Codigo');
		$provinciaModel->Pais_Codigo = Input::get('Pais_Codigo');
		$provinciaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Prov_Codigo)
    {
		$provinciaModel = ProvinciaModel::find($Prov_Codigo);
		$provinciaModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

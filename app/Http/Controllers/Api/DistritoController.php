<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\DistritoModel;
use Illuminate\Support\Facades\Input;

class DistritoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$distritos = DistritoModel::listMany();
		return response($distritos, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Dist_Codigo)
    {
		$distrito = DistritoModel::showOne($Dist_Codigo);
		return response($distrito, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$distritoModel = new DistritoModel;
		$distritoModel->Dist_Codigo = Input::get('Dist_Codigo');
		$distritoModel->Dist_Descripcion = Input::get('Dist_Descripcion');
		$distritoModel->Dist_Estado = Input::get('Dist_Estado');
		$distritoModel->Prov_Codigo = Input::get('Prov_Codigo');
		$distritoModel->Dep_Codigo = Input::get('Dep_Codigo');
		$distritoModel->Pais_Codigo = Input::get('Pais_Codigo');
		$distritoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Dist_Codigo)
    {
		$distritoModel = DistritoModel::prepareUpdate($Dist_Codigo);
		$distritoModel->Dist_Descripcion = Input::get('Dist_Descripcion');
		$distritoModel->Dist_Estado = Input::get('Dist_Estado');
		$distritoModel->Prov_Codigo = Input::get('Prov_Codigo');
		$distritoModel->Dep_Codigo = Input::get('Dep_Codigo');
		$distritoModel->Pais_Codigo = Input::get('Pais_Codigo');
		$distritoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Dist_Codigo)
    {
		$distritoModel = DistritoModel::find($Dist_Codigo);
		$distritoModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

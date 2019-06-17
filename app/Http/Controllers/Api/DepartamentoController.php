<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\DepartamentoModel;
use Illuminate\Support\Facades\Input;

class DepartamentoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$departamentos = DepartamentoModel::listMany();
		return response($departamentos, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Dep_Codigo)
    {
		$departamento = DepartamentoModel::showOne($Dep_Codigo);
		return response($departamento, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$departamentoModel = new DepartamentoModel;
		$departamentoModel->Dep_Codigo = Input::get('Dep_Codigo');
		$departamentoModel->Dep_Descripcion = Input::get('Dep_Descripcion');
		$departamentoModel->Dep_Estado = Input::get('Dep_Estado');
		$departamentoModel->Pais_Codigo = Input::get('Pais_Codigo');
		$departamentoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Dep_Codigo)
    {
		$departamentoModel = DepartamentoModel::prepareUpdate($Dep_Codigo);
		$departamentoModel->Dep_Descripcion = Input::get('Dep_Descripcion');
		$departamentoModel->Dep_Estado = Input::get('Dep_Estado');
		$departamentoModel->Pais_Codigo = Input::get('Pais_Codigo');
		$departamentoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Dep_Codigo)
    {
		$departamentoModel = DepartamentoModel::find($Dep_Codigo);
		$departamentoModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

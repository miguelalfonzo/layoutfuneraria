<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\ClaseModel;
use Illuminate\Support\Facades\Input;

class ClaseController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$clases = ClaseModel::listMany();
		return response($clases, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Cla_Codigo)
    {
		$clase = ClaseModel::showOne($Cla_Codigo);
		return response($clase, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$claseModel = new ClaseModel;
		$claseModel->Cla_Codigo = Input::get('Cla_Codigo');
		$claseModel->Cla_Descripcion = Input::get('Cla_Descripcion');
		$claseModel->Cla_Estado = Input::get('Cla_Estado');
		$claseModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$claseModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Cla_Codigo)
    {
		$claseModel = ClaseModel::prepareUpdate($Cla_Codigo);
		$claseModel->Cla_Descripcion = Input::get('Cla_Descripcion');
		$claseModel->Cla_Estado = Input::get('Cla_Estado');
		$claseModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$claseModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Cla_Codigo)
    {
		$claseModel = ClaseModel::find($Cla_Codigo);
		$claseModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

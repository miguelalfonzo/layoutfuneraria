<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\GrupoModel;
use Illuminate\Support\Facades\Input;

class GrupoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$grupos = GrupoModel::listMany();
		return response($grupos, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Gru_Codigo)
    {
		$grupo = GrupoModel::showOne($Gru_Codigo);
		return response($grupo, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$grupoModel = new GrupoModel;
		$grupoModel->Gru_Codigo = Input::get('Gru_Codigo');
		$grupoModel->Gru_Descripcion = Input::get('Gru_Descripcion');
		$grupoModel->Gru_Estado = Input::get('Gru_Estado');
		$grupoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Gru_Codigo)
    {
		$grupoModel = GrupoModel::prepareUpdate($Gru_Codigo);
		$grupoModel->Gru_Descripcion = Input::get('Gru_Descripcion');
		$grupoModel->Gru_Estado = Input::get('Gru_Estado');
		$grupoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Gru_Codigo)
    {
		$grupoModel = GrupoModel::find($Gru_Codigo);
		$grupoModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

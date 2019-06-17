<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\PaisModel;
use Illuminate\Support\Facades\Input;

class PaisController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$paiss = PaisModel::listMany();
		return response($paiss, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Pais_Codigo)
    {
		$pais = PaisModel::showOne($Pais_Codigo);
		return response($pais, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$paisModel = new PaisModel;
		$paisModel->Pais_Codigo = Input::get('Pais_Codigo');
		$paisModel->Pais_Descripcion = Input::get('Pais_Descripcion');
		$paisModel->Pais_Estado = Input::get('Pais_Estado');
		$paisModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Pais_Codigo)
    {
		$paisModel = PaisModel::prepareUpdate($Pais_Codigo);
		$paisModel->Pais_Descripcion = Input::get('Pais_Descripcion');
		$paisModel->Pais_Estado = Input::get('Pais_Estado');
		$paisModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Pais_Codigo)
    {
		$paisModel = PaisModel::find($Pais_Codigo);
		$paisModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

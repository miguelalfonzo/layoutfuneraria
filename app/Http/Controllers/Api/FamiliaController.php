<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\FamiliaModel;
use Illuminate\Support\Facades\Input;

class FamiliaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$familias = FamiliaModel::listMany();
		return response($familias, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Fam_Codigo)
    {
		$familia = FamiliaModel::showOne($Fam_Codigo);
		return response($familia, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$familiaModel = new FamiliaModel;
		$familiaModel->Fam_Codigo = Input::get('Fam_Codigo');
		$familiaModel->Fam_Descripcion = Input::get('Fam_Descripcion');
		$familiaModel->Fam_Estado = Input::get('Fam_Estado');
		$familiaModel->Clase_Cla_Codigo = Input::get('Clase_Cla_Codigo');
		$familiaModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$familiaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Fam_Codigo)
    {
		$familiaModel = FamiliaModel::prepareUpdate($Fam_Codigo);
		$familiaModel->Fam_Descripcion = Input::get('Fam_Descripcion');
		$familiaModel->Fam_Estado = Input::get('Fam_Estado');
		$familiaModel->Clase_Cla_Codigo = Input::get('Clase_Cla_Codigo');
		$familiaModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$familiaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Fam_Codigo)
    {
		$familiaModel = FamiliaModel::find($Fam_Codigo);
		$familiaModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

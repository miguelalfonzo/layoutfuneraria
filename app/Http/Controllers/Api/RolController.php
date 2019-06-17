<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\RolModel;
use Illuminate\Support\Facades\Input;

class RolController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$roles = RolModel::listMany();
		return response($roles, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Rol_Codigo)
    {
		$rol = RolModel::showOne($Rol_Codigo);
		return response($rol, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$rolModel = new RolModel;
		$rolModel->Rol_Nombre = Input::get('Rol_Nombre');
		$rolModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Rol_Codigo)
    {
		$rolModel = RolModel::prepareUpdate($Rol_Codigo);
		$rolModel->Rol_Nombre = Input::get('Rol_Nombre');
		$rolModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Rol_Codigo)
    {
		$rolModel = RolModel::find($Rol_Codigo);
		$rolModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

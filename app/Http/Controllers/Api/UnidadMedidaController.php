<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\UnidadMedidaModel;
use Illuminate\Support\Facades\Input;

class UnidadMedidaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$unidadMedidas = UnidadMedidaModel::listMany();
		return response($unidadMedidas, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($UMed_Codigo)
    {
		$unidadMedida = UnidadMedidaModel::showOne($UMed_Codigo);
		return response($unidadMedida, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$unidadMedidaModel = new UnidadMedidaModel;
		$unidadMedidaModel->UMed_Descripcion = Input::get('UMed_Descripcion');
		$unidadMedidaModel->UMed_Estado = Input::get('UMed_Estado');
		$unidadMedidaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($UMed_Codigo)
    {
		$unidadMedidaModel = UnidadMedidaModel::prepareUpdate($UMed_Codigo);
		$unidadMedidaModel->UMed_Descripcion = Input::get('UMed_Descripcion');
		$unidadMedidaModel->UMed_Estado = Input::get('UMed_Estado');
		$unidadMedidaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($UMed_Codigo)
    {
		$unidadMedidaModel = UnidadMedidaModel::find($UMed_Codigo);
		$unidadMedidaModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

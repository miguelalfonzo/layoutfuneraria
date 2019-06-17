<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\TipoBienesModel;
use Illuminate\Support\Facades\Input;

class TipoBienesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$tipoBieness = TipoBienesModel::listMany();
		return response($tipoBieness, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($TBien_Codigo)
    {
		$tipoBienes = TipoBienesModel::showOne($TBien_Codigo);
		return response($tipoBienes, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$tipoBienesModel = new TipoBienesModel;
		$tipoBienesModel->TBien_Descripcion = Input::get('TBien_Descripcion');
		$tipoBienesModel->TBien_Estado = Input::get('TBien_Estado');
		$tipoBienesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($TBien_Codigo)
    {
		$tipoBienesModel = TipoBienesModel::prepareUpdate($TBien_Codigo);
		$tipoBienesModel->TBien_Descripcion = Input::get('TBien_Descripcion');
		$tipoBienesModel->TBien_Estado = Input::get('TBien_Estado');
		$tipoBienesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($TBien_Codigo)
    {
		$tipoBienesModel = TipoBienesModel::find($TBien_Codigo);
		$tipoBienesModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

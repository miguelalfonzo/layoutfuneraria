<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\CatalogoBienesModel;
use Illuminate\Support\Facades\Input;

class CatalogoBienesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$catalogoBieness = CatalogoBienesModel::listMany();
		return response($catalogoBieness, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Art_Codigo)
    {
		$catalogoBienes = CatalogoBienesModel::showOne($Art_Codigo);
		return response($catalogoBienes, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$catalogoBienesModel = new CatalogoBienesModel;
		$catalogoBienesModel->Art_Descripcion = Input::get('Art_Descripcion');
		$catalogoBienesModel->Art_Precio_Ref = Input::get('Art_Precio_Ref');
		$catalogoBienesModel->Centro_Gasto = Input::get('Centro_Gasto');
		$catalogoBienesModel->Cuenta_Ingreso = Input::get('Cuenta_Ingreso');
		$catalogoBienesModel->Cuenta_Gasto = Input::get('Cuenta_Gasto');
		$catalogoBienesModel->Art_Estado = Input::get('Art_Estado');
		$catalogoBienesModel->Unidad_Medida_UMed_Codigo = Input::get('Unidad_Medida_UMed_Codigo');
		$catalogoBienesModel->Tipo_Bienes_TBien_Codigo = Input::get('Tipo_Bienes_TBien_Codigo');
		$catalogoBienesModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$catalogoBienesModel->Clase_Cla_Codigo = Input::get('Clase_Cla_Codigo');
		$catalogoBienesModel->Familia_Fam_Codigo = Input::get('Familia_Fam_Codigo');
		$catalogoBienesModel->Clasificador_Gasto = Input::get('Clasificador_Gasto');
		$catalogoBienesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Art_Codigo)
    {
		$catalogoBienesModel = CatalogoBienesModel::prepareUpdate($Art_Codigo);
		$catalogoBienesModel->Art_Descripcion = Input::get('Art_Descripcion');
		$catalogoBienesModel->Art_Precio_Ref = Input::get('Art_Precio_Ref');
		$catalogoBienesModel->Centro_Gasto = Input::get('Centro_Gasto');
		$catalogoBienesModel->Cuenta_Ingreso = Input::get('Cuenta_Ingreso');
		$catalogoBienesModel->Cuenta_Gasto = Input::get('Cuenta_Gasto');
		$catalogoBienesModel->Art_Estado = Input::get('Art_Estado');
		$catalogoBienesModel->Unidad_Medida_UMed_Codigo = Input::get('Unidad_Medida_UMed_Codigo');
		$catalogoBienesModel->Tipo_Bienes_TBien_Codigo = Input::get('Tipo_Bienes_TBien_Codigo');
		$catalogoBienesModel->Grupo_Gru_Codigo = Input::get('Grupo_Gru_Codigo');
		$catalogoBienesModel->Clase_Cla_Codigo = Input::get('Clase_Cla_Codigo');
		$catalogoBienesModel->Familia_Fam_Codigo = Input::get('Familia_Fam_Codigo');
		$catalogoBienesModel->Clasificador_Gasto = Input::get('Clasificador_Gasto');
		$catalogoBienesModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Art_Codigo)
    {
		$catalogoBienesModel = CatalogoBienesModel::find($Art_Codigo);
		$catalogoBienesModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

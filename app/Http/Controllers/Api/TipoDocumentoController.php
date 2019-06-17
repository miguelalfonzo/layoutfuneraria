<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\TipoDocumentoModel;
use Illuminate\Support\Facades\Input;

class TipoDocumentoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$tipoDocumentos = TipoDocumentoModel::listMany();
		return response($tipoDocumentos, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Tdoc_Codigo)
    {
		$tipoDocumento = TipoDocumentoModel::showOne($Tdoc_Codigo);
		return response($tipoDocumento, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$tipoDocumentoModel = new TipoDocumentoModel;
		$tipoDocumentoModel->Tdoc_Descripcion = Input::get('Tdoc_Descripcion');
		$tipoDocumentoModel->Tdoc_Estado = Input::get('Tdoc_Estado');
		$tipoDocumentoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Tdoc_Codigo)
    {
		$tipoDocumentoModel = TipoDocumentoModel::prepareUpdate($Tdoc_Codigo);
		$tipoDocumentoModel->Tdoc_Descripcion = Input::get('Tdoc_Descripcion');
		$tipoDocumentoModel->Tdoc_Estado = Input::get('Tdoc_Estado');
		$tipoDocumentoModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Tdoc_Codigo)
    {
		$tipoDocumentoModel = TipoDocumentoModel::find($Tdoc_Codigo);
		$tipoDocumentoModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

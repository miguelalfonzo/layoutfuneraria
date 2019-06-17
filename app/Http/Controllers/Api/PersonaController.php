<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\PersonaModel;
use Illuminate\Support\Facades\Input;

class PersonaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$personas = PersonaModel::listMany();
		return response($personas, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Per_Codigo)
    {
		$persona = PersonaModel::showOne($Per_Codigo);
		return response($persona, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$personaModel = new PersonaModel;
		$personaModel->Per_Nombre = Input::get('Per_Nombre');
		$personaModel->Per_Apellido = Input::get('Per_Apellido');
		$personaModel->Tip_Codigo = Input::get('Tip_Codigo');
		$personaModel->Per_Numerodoc = Input::get('Per_Numerodoc');
		$personaModel->Per_Direccion = Input::get('Per_Direccion');
		$personaModel->Per_Telmovil = Input::get('Per_Telmovil');
		$personaModel->Per_Telfijo = Input::get('Per_Telfijo');
		$personaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Per_Codigo)
    {
		$personaModel = PersonaModel::prepareUpdate($Per_Codigo);
		$personaModel->Per_Nombre = Input::get('Per_Nombre');
		$personaModel->Per_Apellido = Input::get('Per_Apellido');
		$personaModel->Tip_Codigo = Input::get('Tip_Codigo');
		$personaModel->Per_Numerodoc = Input::get('Per_Numerodoc');
		$personaModel->Per_Direccion = Input::get('Per_Direccion');
		$personaModel->Per_Telmovil = Input::get('Per_Telmovil');
		$personaModel->Per_Telfijo = Input::get('Per_Telfijo');
		$personaModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Per_Codigo)
    {
		$personaModel = PersonaModel::find($Per_Codigo);
		$personaModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

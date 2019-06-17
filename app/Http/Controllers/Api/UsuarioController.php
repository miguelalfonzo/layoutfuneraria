<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\UsuarioModel;
use App\Model\PersonaModel;
use Illuminate\Support\Facades\Input;
use Response;

class UsuarioController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$usuarios = UsuarioModel::listMany();
		return response($usuarios, 200)
			->header('Content-Type', 'text/plain');
	}
	public function showOne($Usu_Codigo)
    {
		$usuario = UsuarioModel::showOne($Usu_Codigo);
		return response($usuario, 200)
			->header('Content-Type', 'text/plain');
	}
	public function addOne()
    {
		$Tip_Codigo = Input::get('Tip_Codigo');
		$Per_Numerodoc = Input::get('Per_Numerodoc');
		$persona = PersonaModel::showOneByDoc($Tip_Codigo,$Per_Numerodoc);
		$usuarioModel = new UsuarioModel;
		$usuarioModel->Usu_Codigo = $persona->Per_Codigo;
		$usuarioModel->Usu_Nombre = Input::get('Usu_Nombre');
		$usuarioModel->Usu_Clave = Input::get('Usu_Clave');
		$usuarioModel->Rol_Codigo = Input::get('Rol_Codigo');
		$usuarioModel->Usu_Estado = Input::get('Usu_Estado');
		$usuarioModel->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function editOne($Usu_Codigo)
    {
		$usuario = UsuarioModel::prepareUpdate($Usu_Codigo);
		$usuario->Usu_Nombre = Input::get('Usu_Nombre');
		$usuario->Rol_Codigo = Input::get('Rol_Codigo');
		$usuario->Usu_Estado = Input::get('Usu_Estado');
		$usuario->save();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
	public function delOne($Usu_Codigo)
    {
		$usuarioModel = UsuarioModel::find($Usu_Codigo);
		$usuarioModel->delete();
		return response([], 200)
			->header('Content-Type', 'text/plain');
	}
}

<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class PerfilController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Grupo';
		$data['listScriptSrc'] = [
			'js/maestro/sperfil.js'
		];
		$data['fnEntityInit'] = 'fnPerfilInit';
		return view('maestro/perfil/index',$data);
	}
}

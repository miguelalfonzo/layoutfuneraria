<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class UsuarioController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Usuario ';
		$data['listScriptSrc'] = [
			'js/maestro/stipo.js',
			'js/maestro/srol.js',
			'js/maestro/susuario.js'
		];
		$data['fnEntityInit'] = 'fnUsuarioInit';
		return view('maestro/usuario/index',$data);
	}
}

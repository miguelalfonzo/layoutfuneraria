<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class DepartamentoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Departamento';
		$data['listScriptSrc'] = [
			'js/maestro/spais.js',
			'js/maestro/sdepartamento.js'
		];
		$data['fnEntityInit'] = 'fnDepartamentoInit';
		return view('maestro/departamento/index',$data);
	}
}

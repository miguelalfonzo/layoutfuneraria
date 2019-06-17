<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class DistritoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Distrito';
		$data['listScriptSrc'] = [
			'js/maestro/spais.js',
			'js/maestro/sdepartamento.js',
			'js/maestro/sprovincia.js',
			'js/maestro/sdistrito.js'
		];
		$data['fnEntityInit'] = 'fnDistritoInit';
		return view('maestro/distrito/index',$data);
	}
}

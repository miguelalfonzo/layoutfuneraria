<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class ProvinciaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Provincia';
		$data['listScriptSrc'] = [
			'js/maestro/spais.js',
			'js/maestro/sdepartamento.js',
			'js/maestro/sprovincia.js'
		];
		$data['fnEntityInit'] = 'fnProvinciaInit';
		return view('maestro/provincia/index',$data);
	}
}

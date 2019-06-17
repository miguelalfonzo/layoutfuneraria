<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class ProveedoresController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Proveedores';
		$data['listScriptSrc'] = [
			'js/maestro/spais.js',
			'js/maestro/sdepartamento.js',
			'js/maestro/sprovincia.js',
			'js/maestro/sdistrito.js',
			'js/maestro/sproveedores.js'
		];
		$data['fnEntityInit'] = 'fnProveedoresInit';
		return view('maestro/proveedores/index',$data);
	}
}

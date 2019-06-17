<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class ClientesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Clientes';
		$data['listScriptSrc'] = [
			'js/maestro/stipodocumento.js',
			'js/maestro/spais.js',
			'js/maestro/sdepartamento.js',
			'js/maestro/sprovincia.js',
			'js/maestro/sdistrito.js',
			'js/maestro/sclientes.js'
		];
		$data['fnEntityInit'] = 'fnClientesInit';
		return view('maestro/clientes/index',$data);
	}
}

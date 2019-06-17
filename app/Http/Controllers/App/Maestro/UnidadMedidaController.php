<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class UnidadMedidaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Unidad Medida';
		$data['listScriptSrc'] = [
			'js/maestro/sunidadmedida.js'
		];
		$data['fnEntityInit'] = 'fnUnidadMedidaInit';
		return view('maestro/unidadmedida/index',$data);
	}
}

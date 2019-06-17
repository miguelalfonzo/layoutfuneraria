<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class PaisController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Pais';
		$data['listScriptSrc'] = [
			'js/maestro/spais.js'
		];
		$data['fnEntityInit'] = 'fnPaisInit';
		return view('maestro/pais/index',$data);
	}
}

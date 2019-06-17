<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class ClaseController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Clase';
		$data['listScriptSrc'] = [
			'js/maestro/sgrupo.js',
			'js/maestro/sclase.js'
		];
		$data['fnEntityInit'] = 'fnClaseInit';
		return view('maestro/clase/index',$data);
	}
}

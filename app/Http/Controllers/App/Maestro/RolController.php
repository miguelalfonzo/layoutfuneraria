<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class RolController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Rol ';
		$data['listScriptSrc'] = [
			'js/maestro/srol.js'
		];
		$data['fnEntityInit'] = 'fnRolInit';
		return view('maestro/rol/index',$data);
	}
}

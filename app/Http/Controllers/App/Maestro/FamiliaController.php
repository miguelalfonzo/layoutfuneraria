<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class FamiliaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		
		$data = parent::getData();
		$data['title'] = 'Familia';
		$data['listScriptSrc'] = [
			'js/maestro/sgrupo.js',
			'js/maestro/sclase.js',
			'js/maestro/sfamilia.js'
		];
		$data['fnEntityInit'] = 'fnFamiliaInit';
		return view('maestro/familia/index',$data);
	}
}

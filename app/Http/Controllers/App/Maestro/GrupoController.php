<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class GrupoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Grupo';
		$data['listScriptSrc'] = [
			'js/maestro/sgrupo.js'
		];
		$data['fnEntityInit'] = 'fnGrupoInit';
		return view('maestro/grupo/index',$data);
	}
}

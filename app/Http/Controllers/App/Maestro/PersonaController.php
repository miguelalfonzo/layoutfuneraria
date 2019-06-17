<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class PersonaController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Persona ';
		$data['listScriptSrc'] = [
			'js/maestro/stipo.js',
			'js/maestro/spersona.js'
		];
		$data['fnEntityInit'] = 'fnPersonaInit';
		return view('maestro/persona/index',$data);
	}
}

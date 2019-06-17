<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class CatalogoBienesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Catalogo Bienes';
		$data['listScriptSrc'] = [
			'js/maestro/sgrupo.js',
			'js/maestro/sclase.js',
			'js/maestro/sfamilia.js',
			'js/maestro/sunidadmedida.js',
			'js/maestro/stipobienes.js',
			'js/maestro/scatalogobienes.js'
		];
		$data['fnEntityInit'] = 'fnCatalogoBienesInit';
		return view('maestro/catalogobienes/index',$data);
	}
}

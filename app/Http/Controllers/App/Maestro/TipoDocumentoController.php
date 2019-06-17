<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class TipoDocumentoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Tipo Documento';
		$data['listScriptSrc'] = [
			'js/maestro/stipodocumento.js'
		];
		$data['fnEntityInit'] = 'fnTipoDocumentoInit';
		return view('maestro/tipodocumento/index',$data);
	}
}

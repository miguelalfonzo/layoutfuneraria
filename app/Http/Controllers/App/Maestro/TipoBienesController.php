<?php

namespace App\Http\Controllers\App\Maestro;

use App\Http\Controllers\AdminController;

class TipoBienesController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = 'Tipo Bienes';
		$data['listScriptSrc'] = [
			'js/maestro/stipobienes.js'
		];
		$data['fnEntityInit'] = 'fnTipoBienesInit';
		return view('maestro/tipobienes/index',$data);
	}
}

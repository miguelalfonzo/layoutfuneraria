<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AdminController;
use App\Model\TipoModel;

class TipoController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function listMany()
    {
		$tipos = TipoModel::all();
		return response($tipos, 200)
			->header('Content-Type', 'text/plain');
	}
}

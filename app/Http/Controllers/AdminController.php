<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	/* Autor. SYLAR.JM */
	private $data = [
		'title' => 'Title ',
		'privilegios' => [],
		'listScriptSrc' => [],
		'listCssSrc' => [],
		'userNick' => "Nick",
		'userName' => "Name",
		'fnEntityInit' => 'void'
	];
    public function __construct()
    {
		define("MY_API_URL", url("/api"));
		//define("MY_API_URL", 'https://consorciomadisac.com/web/public/api');
		define("MY_APP_URL", url("/app"));
    }
	public function getData() {
		return $this->data;
	}
}

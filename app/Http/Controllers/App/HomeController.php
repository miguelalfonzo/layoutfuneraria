<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\AdminController;

class HomeController extends AdminController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
		parent::__construct();
    }
	public function index()
    {
		$data = parent::getData();
		$data['title'] = "Home";
		// return view('home', $data);
		return view('layout',$data);
	}
}

<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Model\UsuarioModel;
use Response;

class LoginController extends Controller
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
    }
	public function index()
    {
		return view('login/index');
	}
}

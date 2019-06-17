<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\PublicController;
use App\Model\UsuarioModel;
use Response;

class LoginController extends PublicController
{
	/* Autor. SYLAR.JM */
    public function __construct()
    {
    }
	public function login()
    {
		echo "login";
	}
	public function logout()
    {
		echo "logout";
	}
}

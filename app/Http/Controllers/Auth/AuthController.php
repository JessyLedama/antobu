<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     *  Get login page
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     *  Get register page
     */
    public function register()
    {
        return view('auth.register');
    }
}
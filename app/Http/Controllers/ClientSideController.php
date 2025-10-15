<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientSideController extends Controller
{
    //

    public function index ()
    {
        return view('layouts/user_home');
    }
    public function login()
    {
        return view('pages/auth/login');
    }
    public function registrasi()
    {
        return view('pages/auth/registrasi');
    }
}

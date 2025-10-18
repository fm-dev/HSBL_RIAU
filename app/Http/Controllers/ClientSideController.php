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
    public function myeventPage(){
        return view('pages/user/myevent');
    }
    public function monitoringPutraView(){
        return view('pages/user/monitoringPutra');
    }
    public function tambahAnggota(){
        return view('pages/user/tambahanggota');
    }
}

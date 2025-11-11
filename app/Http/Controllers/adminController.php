<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('pages.admin.index');
    }
    public function detailProfile(){
        return view('pages.admin.profile.profile');
    }
    public function dataAdminView(){
        return view('pages.admin.profile.dataAdmin');
    }
}

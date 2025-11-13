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
    public function dataUserView(){
        return view('pages.admin.profile.dataUser');
    }
    public function dataListTeam(){
        return view("pages.admin.team.teamList");
    }
    public function dataListSeasons(){
        return view("pages.admin.events.listDataSeasons");
    }
    public function dataListKompetisi(){
        return view("pages.admin.events.listDataKompetisi");
    }
}

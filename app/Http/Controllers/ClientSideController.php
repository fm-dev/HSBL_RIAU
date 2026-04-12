<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datKompetisiEvent;
use App\Models\datuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientSideController extends Controller
{
    //
    protected $atributes = [];
    public function __construct() {}
    public function index()
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
    public function myeventPage()
    {
        $dataKompeteisiEvent = datuser::join('dat_kompetisi_events', function ($join) {
            $join->on(DB::raw('FIND_IN_SET(dat_kompetisi_events.id, datusers.kompetisi_event_id)'), '>', DB::raw('0'));
        })
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->select(
                'datusers.*', 
                'dat_kompetisi_events.namaTeam as teamName',
                'datkompetisis.name as kompetisiName')
            ->where('datusers.id', Auth::id())
            ->get();
        $this->atributes['listKompetisiEvents'] = $dataKompeteisiEvent;
        return view('pages/user/myevent', $this->atributes);
    }
    public function monitoringPutraView()
    {
        return view('pages/user/monitoringPutra');
    }
    public function tambahAnggota()
    {
        return view('pages/user/tambahanggota');
    }
}

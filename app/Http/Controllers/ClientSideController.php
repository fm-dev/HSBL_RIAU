<?php

namespace App\Http\Controllers;

use App\Models\datEventsScore;
use App\Models\datjersey;
use App\Models\datkompetisi;
use Illuminate\Http\Request;
use App\Models\datKompetisiEvent;
use App\Models\datofficial;
use App\Models\datPeserta;
use App\Models\datuser;
use App\Models\datPosisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientSideController extends Controller
{
    //
    protected $atributes = [];
    public function __construct()
    {
        $dataPositions = datPosisi::get();
        $this->atributes['posisi'] = $dataPositions;
    }
    public function index(Request $req)
    {
        $dataKompetisi = datkompetisi::get();

        if ($req->get('kompetisi_id')) {
            $getFirstDataKompetisi = datkompetisi::where('id', $req->get('kompetisi_id'))->first();
            $getDataFinal = datEventsScore::where('kompetisi_id', $getFirstDataKompetisi['id'])
                ->leftJoin('dat_kompetisi_events as team1', 'dat_events_scores.firstTeam_id', '=', 'team1.id')
                ->leftJoin('dat_kompetisi_events as team2', 'dat_events_scores.secondTeam_id', '=', 'team2.id')
                ->leftJoin('dat_sekolahs as sekolahTeam1', 'team1.idSekolah', '=', 'sekolahTeam1.id')
                ->leftJoin('dat_sekolahs as sekolahTeam2', 'team2.idSekolah', '=', 'sekolahTeam2.id')
                ->select(
                    'dat_events_scores.*',
                    'team1.namaTeam as first_team_name',
                    'team2.namaTeam as second_team_name',
                    'sekolahTeam1.logo as sekolah_team1',
                    'sekolahTeam2.logo as sekolah_team2',
                )
                ->where('isFinal', 1) // pakai 1 untuk boolean true
                ->first(); // ambil satu baris saja
            $getDataPertandingan = datEventsScore::where('kompetisi_id', $getFirstDataKompetisi['id'])
                ->leftJoin('dat_kompetisi_events as team1', 'dat_events_scores.firstTeam_id', '=', 'team1.id')
                ->leftJoin('dat_kompetisi_events as team2', 'dat_events_scores.secondTeam_id', '=', 'team2.id')
                ->leftJoin('dat_sekolahs as sekolahTeam1', 'team1.idSekolah', '=', 'sekolahTeam1.id')
                ->leftJoin('dat_sekolahs as sekolahTeam2', 'team2.idSekolah', '=', 'sekolahTeam2.id')
                ->select(
                    'dat_events_scores.*',
                    'team1.namaTeam as first_team_name',
                    'team2.namaTeam as second_team_name',
                    'sekolahTeam1.logo as sekolah_team1',
                    'sekolahTeam2.logo as sekolah_team2',
                )
                ->get();
            $this->atributes['dataKompetisi'] = $dataKompetisi;
            $this->atributes['dataFinal'] = $getDataFinal;
            $this->atributes['datapertandingan'] = $getDataPertandingan;
            return view('layouts/user_home', $this->atributes);
        }
        $getFirstDataKompetisi = $dataKompetisi->first();
        $getDataFinal = datEventsScore::where('kompetisi_id', $getFirstDataKompetisi['id'])
            ->leftJoin('dat_kompetisi_events as team1', 'dat_events_scores.firstTeam_id', '=', 'team1.id')
            ->leftJoin('dat_kompetisi_events as team2', 'dat_events_scores.secondTeam_id', '=', 'team2.id')
            ->leftJoin('dat_sekolahs as sekolahTeam1', 'team1.idSekolah', '=', 'sekolahTeam1.id')
            ->leftJoin('dat_sekolahs as sekolahTeam2', 'team2.idSekolah', '=', 'sekolahTeam2.id')
            ->select(
                'dat_events_scores.*',
                'team1.namaTeam as first_team_name',
                'team2.namaTeam as second_team_name',
                'sekolahTeam1.logo as sekolah_team1',
                'sekolahTeam2.logo as sekolah_team2',
            )
            ->where('isFinal', 1) // pakai 1 untuk boolean true
            ->first(); // ambil satu baris saja
        $getDataPertandingan = datEventsScore::where('kompetisi_id', $getFirstDataKompetisi['id'])
            ->leftJoin('dat_kompetisi_events as team1', 'dat_events_scores.firstTeam_id', '=', 'team1.id')
            ->leftJoin('dat_kompetisi_events as team2', 'dat_events_scores.secondTeam_id', '=', 'team2.id')
            ->leftJoin('dat_sekolahs as sekolahTeam1', 'team1.idSekolah', '=', 'sekolahTeam1.id')
            ->leftJoin('dat_sekolahs as sekolahTeam2', 'team2.idSekolah', '=', 'sekolahTeam2.id')
            ->select(
                'dat_events_scores.*',
                'team1.namaTeam as first_team_name',
                'team2.namaTeam as second_team_name',
                'sekolahTeam1.logo as sekolah_team1',
                'sekolahTeam2.logo as sekolah_team2',
            )
            ->get();
        $this->atributes['dataKompetisi'] = $dataKompetisi;
        $this->atributes['dataFinal'] = $getDataFinal;
        $this->atributes['datapertandingan'] = $getDataPertandingan;
        return view('layouts/user_home', $this->atributes);
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
            ->join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->select(
                'datusers.*',
                'dat_kompetisi_events.id as idevent',
                'dat_kompetisi_events.namaTeam as teamName',
                'dat_kompetisi_events.leader as leaderTeam',
                'dat_kompetisi_events.verifData  as verifData',
                'datkompetisis.name as kompetisiName',
                'dat_sekolahs.namaSekolah as namaSekolah'
            )
            ->where('datusers.id', Auth::id())
            ->get();
        $dataUser =  datuser::where('datusers.id', Auth::id())->get();
        $this->atributes['listKompetisiEvents'] = $dataKompeteisiEvent;
        $this->atributes['userData'] = $dataUser;
        return view('pages/user/myevent', $this->atributes);
    }
    public function monitoringPutraView(Request $request)
    {
        $dataKompeteisiEvent = datKompetisiEvent::join('dat_sekolahs', "dat_sekolahs.id", "=", "dat_kompetisi_events.idSekolah")
            ->join('dat_series', "dat_series.id", '=', 'dat_kompetisi_events.idSeries')
            ->join('datkompetisis', 'datkompetisis.id', '=', 'dat_kompetisi_events.idKompetisi')
            ->join('dat_seasons', 'dat_seasons.id', '=', 'datkompetisis.seasonId')
            ->select(
                'dat_kompetisi_events.namaTeam as namaTeam',
                'dat_kompetisi_events.id as idevent',
                'dat_sekolahs.namaSekolah  as namaSekolah',
                'dat_sekolahs.id  as idSekolah',
                'dat_series.name as nameSeries',
                'datkompetisis.name as nameKompetisi',
                'dat_seasons.path_template_izinOrtu as path_template_izinOrtu',
                'dat_seasons.path_template_izin_kepala_sekolah as path_template_izin_kepala_sekolah',
            )
            ->where('dat_kompetisi_events.id', $request->get('idevent'))->first();
        $dataPeserta = datPeserta::join('dat_kompetisi_events', 'dat_kompetisi_events.id', '=', 'dat_pesertas.id_events')
            ->select(
                'dat_pesertas.namaLengkap as nama',
                'dat_pesertas.id as idPeserta',
                'dat_kompetisi_events.leader as leader',
                'dat_pesertas.path_photo as pathPhoto',
            )
            ->where('id_events', $request->get('idevent'))->get();
        $dataOfficial = datofficial::where('eventsId', $request->get('idevent'))->get();
        $dataJersey = datjersey::where('events_id', $request->get('idevent'))->get();
        
        $this->atributes['listKompetisiEvents'] = $dataKompeteisiEvent;
        $this->atributes['listPeserta'] = $dataPeserta;
        $this->atributes['listJersey'] = $dataJersey;
        $this->atributes['listOfficial'] = $dataOfficial;
        return view('pages/user/monitoringPutra', $this->atributes);
    }
    public function tambahAnggota()
    {
        return view('pages/user/tambahanggota', $this->atributes);
    }
}

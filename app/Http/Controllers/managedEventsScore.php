<?php

namespace App\Http\Controllers;

use App\Models\datEventsScore;
use App\Models\datkompetisi;
use App\Models\datKompetisiEvent;
use App\Models\datMenuChild;
use App\Models\datMenuParent;
use App\Models\datSeason;
use App\Models\datSeries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class managedEventsScore extends Controller
{
    protected $atributes = [];
    public function __construct()
    {
        //
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('portal.admin.login');
        }

        $roleId = $user->role;
        $menus = $this->getMenuByRole($roleId);
        $this->atributes['menus'] = $menus;
    }
    public function getMenuByRole($roleId)
    {

        $menuParents = datMenuParent::where('roleId', $roleId)->get();
        $menuChildren = datMenuChild::whereIn('parentId', $menuParents->pluck('id'))->get();
        // Build menu structure
        $menus = [];
        foreach ($menuParents as $parent) {
            $children = $menuChildren->where('parentId', $parent->id);
            $menus[] = [
                'id' => $parent->id,
                'labelMenu' => $parent->labelMenu,
                'path' => $parent->path,
                'children' => $children->map(function ($child) {
                    return [
                        'id' => $child->id,
                        'labelMenu' => $child->labelMenu,
                        'path' => $child->path,
                        'parentId' => $child->parentId,
                    ];
                })->toArray()
            ];
        }

        return $menus;
    }
    public function dashboard()
    {
        $data = datkompetisi::get();
        $dataPertandingan = datEventsScore::query()
            ->leftJoin('dat_kompetisi_events as team1', 'dat_events_scores.firstTeam_id', '=', 'team1.id')
            ->leftJoin('dat_kompetisi_events as team2', 'dat_events_scores.secondTeam_id', '=', 'team2.id')
            ->leftJoin('datkompetisis as k', 'dat_events_scores.kompetisi_id', '=', 'k.id') // join ke tabel kompetisi
            ->select(
                'dat_events_scores.*',
                'team1.namaTeam as first_team_name',
                'team2.namaTeam as second_team_name',
                'k.name as kompetisi_name' // ambil nama kompetisi
            )
            ->orderBy('dat_events_scores.datebegin', 'desc')
            ->get();
        $this->atributes['listEvents'] = $data;
        $this->atributes['listEventsScore'] = $dataPertandingan;
        return view("pages.admin.eventsScore.dashboard", $this->atributes);
    }
    public function form(Request $req)
    {
        $id = $req->get('id_events');

        if (!$id) {
            return redirect()->back()->with('error', 'Kompetisi tidak ditemukan.');
        }

        $datakompetisi = datkompetisi::where('id', $id)->first();

        if (!$datakompetisi) {
            return redirect()->back()->with('error', 'Data kompetisi tidak ditemukan.');
        }

        $dataTeam = datKompetisiEvent::where('idKompetisi', $id)->get();

        $dataSession = datSeason::where('id', $datakompetisi->seasonId)->first();

        $dataSeries = datSeries::where('id', $dataTeam[0]['idSeries'])->first();

        $this->atributes['id_events'] = $id;
        $this->atributes['dataTeam'] = $dataTeam;
        $this->atributes['datakompetisi'] = $datakompetisi;
        $this->atributes['dataSession'] = $dataSession;
        $this->atributes['dataseries'] = $dataSeries;


        return view("pages.admin.eventsScore.insert", $this->atributes);
    }
    public function store(Request $request)
    {


        DB::beginTransaction();

        try {
            $request->validate([
                'kompetisi_id' => 'required|integer',
                'team_1' => 'required|integer|different:team_2',
                'team_2' => 'required|integer|different:team_1',
                'tanggal_pertandingan' => 'required|date',
                'jam_pertandingan' => 'required|date_format:H:i',
                'score_team_1' => 'required|integer|min:0',
                'score_team_2' => 'required|integer|min:0',
            ], [
                'team_1.different' => 'Team 1 dan Team 2 tidak boleh sama.',
                'team_2.different' => 'Team 1 dan Team 2 tidak boleh sama.',
            ]);
            datEventsScore::create([
                'kompetisi_id' => $request->kompetisi_id,
                'firstTeam_id' => $request->team_1,
                'secondTeam_id' => $request->team_2,
                'datebegin' => Carbon::parse(
                    $request->tanggal_pertandingan . ' ' . $request->jam_pertandingan
                ),
                'time_begin' => $request->jam_pertandingan,
                'score_first_teeam' => $request->score_team_1,
                'score_second_teeam' => $request->score_team_2,
                'isFinal' => $request->has('isFinal') ? 1 : 0,
            ]);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Data pertandingan berhasil ditambahkan.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Gagal : ' . $ex->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datSeason;
use Illuminate\Support\Facades\Auth;
use App\Models\datMenuParent;
use App\Models\datMenuChild;
use App\Models\datkompetisi;
use App\Models\datuser;
use App\Models\datSeries;
use App\Models\datSekolah;
use App\Models\datKompetisiEvent;
use App\Models\blacklistTeam;
use App\Models\datPosisi;
use App\Models\datWilayah;
use Illuminate\Support\Facades\DB;
use PDO;

class masterDataController extends Controller
{
    protected $datSeason;
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
        $this->atributes['season'] = datSeason::all();
        $this->atributes['kompetisi'] = datkompetisi::all();
        $this->atributes['series'] = datSeries::all();
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
    public function FormCreatedSeason()
    {
        return view('pages.admin.formCreatedSesion', $this->atributes);
    }
    public function createdSesions(Request $request)
    {
        try {
            $data = $request->validate([
                'name_sesion' => 'required|string',
                'path_template_izinOrtu' => 'required|file|mimes:pdf,doc,docx',
                'path_template_izin_kepala_sekolah' => 'required|file|mimes:pdf,doc,docx',
            ]);

            // Simpan file ke storage/public/sessions
            $fileOrtuPath = $request->file('path_template_izinOrtu')->store('sessions', 'public');
            $fileKepalaPath = $request->file('path_template_izin_kepala_sekolah')->store('sessions', 'public');

            datSeason::create([
                'name' => $data['name_sesion'],
                'path_template_izinOrtu' => $fileOrtuPath,
                'path_template_izin_kepala_sekolah' => $fileKepalaPath,
                'createdby' => Auth::id(),
                'modby' => Auth::id(),
            ]);

            return redirect('admin/session')->with('success', 'Season berhasil dibuat.');
        } catch (\Exception $ex) {
            return redirect('admin/session')->with('error', 'Gagal membuat season: ' . $ex->getMessage());
        }
    }
    public function sessionIndex()
    {
        $data = datSeason::all();
        $this->atributes['listSession'] = $data;
        return view('pages.admin.events.listDataSeasons', $this->atributes);
    }
    public function deleteSession($id)
    {
        try {
            $season = datSeason::find($id);
            if (!$season) {
                return redirect('admin/session')->with('error', 'Season tidak ditemukan.');
            }
            $season->delete();
            return redirect('admin/session')->with('success', 'Season berhasil dihapus.');
        } catch (\Exception $ex) {
            // Tangani error jika ada masalah
            return redirect('admin/session')->with('error', 'Gagal menghapus season: ' . $ex->getMessage());
        }
    }
    public function kompetisiIndex()
    {
        $data = datkompetisi::join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select('datkompetisis.*', 'dat_seasons.name as seasonName')
            ->get();
        $this->atributes['listKompetisi'] = $data;
        return view('pages.admin.events.listDataKompetisi', $this->atributes);
    }
    public function FormCreatedkompetisi()
    {
        return view('pages.admin.formCreateKompetisi', $this->atributes);
    }
    public function createdkompetisi(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'seasonId' => 'required',
            ]);

            datkompetisi::create([
                'name' => $data['name'],
                'seasonId' => $data['seasonId'],
            ]);
            return redirect('admin/kompetisi')->with('success', 'Kompetisi berhasil dibuat.');
        } catch (\Exception $ex) {
            return redirect('admin/kompetisi')->with('error', 'Gagal membuat kompetisi: ' . $ex->getMessage());
        }
    }
    public function delteKompetisi($id)
    {
        try {
            $kompetisi = datkompetisi::find($id);
            if (!$kompetisi) {
                return redirect('admin/kompetisi')->with('error', 'Kompetisi tidak ditemukan.');
            }
            $kompetisi->delete();
            return redirect('admin/kompetisi')->with('success', 'Kompetisi berhasil dihapus.');
        } catch (\Exception $ex) {
            // Tangani error jika ada masalah
            return redirect('admin/kompetisi')->with('error', 'Gagal menghapus kompetisi: ' . $ex->getMessage());
        }
    }
    public function listMasterUser()
    {
        $dataUser = Auth::user();

        // Mulai query builder
        $query = datuser::query();

        // Filter role & wilayah jika user role 2
        if ($dataUser->role == 2) {
            $query->where('wilayah', $dataUser->wilayah);
        }

        // Ambil hanya user role 3
        $query->where('role', 3);

        // Join tabel terkait
        $listUsers = $query->join('dat_kompetisi_events', function ($join) {
            $join->on(DB::raw('FIND_IN_SET(dat_kompetisi_events.id, datusers.kompetisi_event_id)'), '>', DB::raw('0'));
        })
            ->join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'datusers.id as user_id',
                'datusers.username',
                'datusers.email',
                DB::raw("GROUP_CONCAT(DISTINCT dat_series.name SEPARATOR ', ') as seriesName"),
                DB::raw("GROUP_CONCAT(DISTINCT dat_seasons.name SEPARATOR ', ') as seasonName"),
                DB::raw("GROUP_CONCAT(DISTINCT datkompetisis.name SEPARATOR ', ') as kompetisiName"),
                DB::raw("GROUP_CONCAT(DISTINCT dat_sekolahs.namaSekolah SEPARATOR ', ') as namaSekolah")
            )
            ->groupBy('datusers.id', 'datusers.username', 'datusers.email')
            ->get();

        $this->atributes['listUsers'] = $listUsers;

        return view('pages.admin.users.listUsers', $this->atributes);
    }
    public function viewAddUsers()
    {
        $user = Auth::user();
        $dataWilaya = datWilayah::find($user->wilayah);

        $query = datKompetisiEvent::query()
            ->join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis as kompetisi', 'dat_kompetisi_events.idKompetisi', '=', 'kompetisi.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'kompetisi.seasonId', '=', 'dat_seasons.id')
            ->select(
                'dat_kompetisi_events.*',
                'dat_sekolahs.namaSekolah',
                'kompetisi.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            );

        // Filter khusus jika user role 2
        if ($user->role == 2 && $dataWilaya) {
            $query->where('dat_series.name', $dataWilaya->namaWilayah);
        }

        // Ambil data
        $data = $query->get();

        $this->atributes['listKompetisiEvents'] = $data;
        return view('pages.admin.users.formUsers', $this->atributes);
    }
    public function StoreUsers(Request $req)
    {
        DB::beginTransaction();
        try {
            $req = $req->validate([
                'username' => 'required|string|unique:datusers,username',
                'password' => 'required|string|min:6',
                'email' => 'nullable|email|unique:datusers,email',
                'phone' => 'nullable|string|unique:datusers,phone',
                'role' => 'required|string',
                'alamat' => 'nullable|string',
                'wilayah' => 'nullable|string',
                'kompetisi_id' => 'nullable|exists:datkompetisis,id',
                'series_id' => 'nullable|exists:datseries,id',
                'session_id' => 'nullable|exists:datseasons,id',
                'asal_sekolah' => 'nullable|string'
            ]);

            datuser::create($req);
            DB::commit();
            return redirect('admin/users')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $ex->getMessage());
        }
    }
    public function seriesIndex()
    {
        $data = datSeries::all();
        $this->atributes['listSeries'] = $data;
        return view('pages.admin.series.index', $this->atributes);
    }
    public function FormCreatedSeries()
    {
        return view('pages.admin.series.form', $this->atributes);
    }
    public function createdSeries(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|string',
            ]);

            datSeries::create([
                'name' => $data['name'],
                'createdby' => Auth::id(),
            ]);
            return redirect('admin/series')->with('success', 'Series berhasil dibuat.');
        } catch (\Exception $ex) {
            return redirect('admin/series')->with('error', 'Gagal membuat series: ' . $ex->getMessage());
        }
    }
    public function deleteSeries($id)
    {
        try {
            $series = datSeries::find($id);
            if (!$series) {
                return redirect('admin/series')->with('error', 'Series tidak ditemukan.');
            }
            $series->delete();
            return redirect('admin/series')->with('success', 'Series berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/series')->with('error', 'Gagal menghapus series: ' . $ex->getMessage());
        }
    }
    public function createdMasterUser(Request $req)
    {
        DB::beginTransaction();
        try {
            $req = $req->validate([
                'username' => 'required|string|unique:datusers,username',
                'password' => 'required|string|min:6',
                'email' => 'nullable|email|unique:datusers,email',
                'phone' => 'nullable|string|unique:datusers,phone',
                'alamat' => 'nullable|string',
                'kompetisi_event_id' => 'required|array',

            ]);
            $req['kompetisi_event_id'] =  implode(',', $req['kompetisi_event_id']);;
            $req['role'] = 3;
            $req['status'] = 'active';
            $req['wilayah'] = Auth::user()->wilayah;
            $req['createdby'] =  Auth::user()->username;
            $req['password'] = bcrypt($req['password']);
            datuser::create($req);
            DB::commit();
            return redirect('admin/masterUser/list')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $ex->getMessage());
        }
    }
    public function sekolahIndex()
    {
        $data = datSekolah::all();
        $this->atributes['listSekolah'] = $data;
        return view('pages.admin.sekolah.list', $this->atributes);
    }
    public function formSekolah()
    {
        return view('pages.admin.sekolah.form', $this->atributes);
    }
    public function storesekolah(Request $req)
    {
        DB::beginTransaction();
        try {
            $data = $req->validate([
                'name' => 'required|string',
                'logo' => 'required|file|mimes:jpg,png,jpeg|max:2048',
            ]);
            $logoPath = $req->file('logo')->store('logos', 'public');
            datSekolah::create([

                'namaSekolah' => $data['name'],
                'logo' => $logoPath,
                'createdby' => Auth::id(),
            ]);
            DB::commit();
            return redirect('admin/sekolah')->with('success', 'Sekolah berhasil dibuat.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/sekolah')->with('error', 'Gagal membuat sekolah: ' . $ex->getMessage());
        }
    }
    public function deleteSekolah($id)
    {
        try {
            $sekolah = datSekolah::find($id);
            if (!$sekolah) {
                return redirect('admin/sekolah')->with('error', 'Sekolah tidak ditemukan.');
            }
            $sekolah->delete();
            return redirect('admin/sekolah')->with('success', 'Sekolah berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/sekolah')->with('error', 'Gagal menghapus sekolah: ' . $ex->getMessage());
        }
    }
    public function editSekolah($id)
    {
        $sekolah = datSekolah::find($id);
        if (!$sekolah) {
            return redirect('admin/sekolah')->with('error', 'Sekolah tidak ditemukan.');
        }
        $this->atributes['sekolah'] = $sekolah;
        return view('pages.admin.sekolah.edit', $this->atributes);
    }
    public function updateSekolah(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            $sekolah = datSekolah::find($id);
            if (!$sekolah) {
                return redirect('admin/sekolah')->with('error', 'Sekolah tidak ditemukan.');
            }
            $data = $req->validate([
                'name' => 'required|string',
                'logo' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($req->hasFile('logo')) {
                $logoPath = $req->file('logo')->store('logos', 'public');
                $sekolah->logo = $logoPath;
            }
            $sekolah->namaSekolah = $data['name'];
            $sekolah->modby = Auth::id();
            $sekolah->save();
            DB::commit();
            return redirect('admin/sekolah')->with('success', 'Sekolah berhasil diperbarui.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/sekolah')->with('error', 'Gagal memperbarui sekolah: ' . $ex->getMessage());
        }
    }

    public function teamList()
    {
        $dataUser = Auth::user();
        $dataWilaya = datWilayah::find($dataUser->wilayah);
        $data = datKompetisiEvent::join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'dat_kompetisi_events.*',
                'dat_sekolahs.namaSekolah',
                'datkompetisis.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            );
        if ($dataUser->role == 2 && $dataWilaya) {
            $data->where('dat_series.name', $dataWilaya->namaWilayah);
        }
        $data = $data->get();
            

        $this->atributes['listKompetisiEvents'] = $data;
        $this->atributes['statusVerifikasi'] = false;
        return view('pages.admin.kompetisiTournament.list', $this->atributes);
    }
    public function formKompetisi()
    {
        $dataUser = Auth::user();
        $dataWilaya = datWilayah::find($dataUser->wilayah);
        $this->atributes['listSekolah'] = datSekolah::all();
        $this->atributes['listKompetisi'] = datkompetisi::JOIN('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select('datkompetisis.*', 'dat_seasons.name as seasonName')
            ->get();
        $this->atributes['listSeries'] = ($dataUser->role == 2 && $dataWilaya) ? datSeries::where('name', $dataWilaya->namaWilayah)->get() : datSeries::all();

        return view('pages.admin.kompetisiTournament.form', $this->atributes);
    }
    public function storeKompetisiEvents(Request $req)
    {
        DB::beginTransaction();
        try {
            $data = $req->validate([
                'idSekolah' => 'required',
                'namaTeam' => 'required|string',
                'idKompetisi' => 'required',
                'idSeries' => 'required',
                'leader' => 'required|string',
            ]);

            datKompetisiEvent::create([
                'idSekolah' => $data['idSekolah'],
                'namaTeam' => $data['namaTeam'],
                'idKompetisi' => $data['idKompetisi'],
                'idSeries' => $data['idSeries'],
                'leader' => $data['leader'],
                'kunciData' => 'false',
                'verifData' =>  'false',
                'createdby' => Auth::id(),
            ]);
            DB::commit();
            return redirect('admin/kompetisi/team_list')->with('success', 'Tim kompetisi berhasil dibuat.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/kompetisi/team_list')->with('error', 'Gagal membuat tim kompetisi: ' . $ex->getMessage());
        }
    }
    public function deleteKompetisiEvents($id)
    {
        try {
            $kompetisiEvent = datKompetisiEvent::find($id);
            if (!$kompetisiEvent) {
                return redirect('admin/kompetisi/team_list')->with('error', 'Tim kompetisi tidak ditemukan.');
            }
            $kompetisiEvent->delete();
            return redirect('admin/kompetisi/team_list')->with('success', 'Tim kompetisi berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/kompetisi/team_list')->with('error', 'Gagal menghapus tim kompetisi: ' . $ex->getMessage());
        }
    }
    public function editKompetisiEvents($id)
    {
        $kompetisiEvent = datKompetisiEvent::find($id);
        if (!$kompetisiEvent) {
            return redirect('admin/kompetisi/team_list')->with('error', 'Tim kompetisi tidak ditemukan.');
        }
        $this->atributes['kompetisiEvent'] = $kompetisiEvent;
        $this->atributes['listSekolah'] = datSekolah::all();
        $this->atributes['listKompetisi'] = datkompetisi::JOIN('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select('datkompetisis.*', 'dat_seasons.name as seasonName')
            ->get();
        $this->atributes['listSeries'] = datSeries::all();
        return view('pages.admin.kompetisiTournament.edit', $this->atributes);
    }
    public function updateKompetisiEvents(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            $kompetisiEvent = datKompetisiEvent::find($id);
            if (!$kompetisiEvent) {
                return redirect('admin/kompetisi/team_list')->with('error', 'Tim kompetisi tidak ditemukan.');
            }
            $data = $req->validate([
                'idSekolah' => 'required',
                'namaTeam' => 'required|string',
                'idKompetisi' => 'required',
                'idSeries' => 'required',
                'leader' => 'required|string',
                'kunciData' => 'nullable',
                'verifData' => 'nullable',
            ]);

            $kompetisiEvent->idSekolah = $data['idSekolah'];
            $kompetisiEvent->namaTeam = $data['namaTeam'];
            $kompetisiEvent->idKompetisi = $data['idKompetisi'];
            $kompetisiEvent->idSeries = $data['idSeries'];
            $kompetisiEvent->leader = $data['leader'];
            $kompetisiEvent->modby = Auth::id();
            if (isset($data['kunciData'])) {
                $kompetisiEvent->kunciData = $data['kunciData'];
            } else {
                $kompetisiEvent->kunciData = 'false';
            }
            if (isset($data['verifData'])) {
                $kompetisiEvent->verifData = $data['verifData'];
            } else {
                $kompetisiEvent->verifData = 'false';
            }
            $kompetisiEvent->save();
            DB::commit();
            return redirect('admin/kompetisi/team_list')->with('success', 'Tim kompetisi berhasil diperbarui.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/kompetisi/team_list')->with('error', 'Gagal memperbarui tim kompetisi: ' . $ex->getMessage());
        }
    }
    public function teamVerificationList()
    {
        $dataUser = Auth::user();
        $dataWilaya = datWilayah::find($dataUser->wilayah);
        $data = datKompetisiEvent::join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'dat_kompetisi_events.*',
                'dat_sekolahs.namaSekolah',
                'datkompetisis.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            )
            ->where('verifData', 'true');
        if ($dataUser->role == 2 && $dataWilaya) {
            $data->where('dat_series.name', $dataWilaya->namaWilayah);
        }
        $data = $data->get();
        
        $this->atributes['listKompetisiEvents'] = $data;
        $this->atributes['statusVerifikasi'] = true;
        return view('pages.admin.kompetisiTournament.list', $this->atributes);
    }
    public function teamVerificationDetail($id)
    {

        $data = datKompetisiEvent::join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'dat_kompetisi_events.*',
                'dat_sekolahs.namaSekolah',
                'datkompetisis.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            )
            ->where('dat_kompetisi_events.id', $id)
            ->first();
        if (!$data) {
            return redirect('admin/kompetisi/team_verification/list')->with('error', 'Tim kompetisi tidak ditemukan.');
        }
        $this->atributes['kompetisiEvent'] = $data;
        $this->atributes['statusVerifikasi'] = true;
        return view('pages.admin.kompetisiTournament.detail', $this->atributes);
    }
    public function teamBlacklistList()
    {
        $dataUser = Auth::user();
        $dataWilaya = datWilayah::find($dataUser->wilayah);
        $data = blacklistTeam::join('dat_kompetisi_events', 'blacklist_teams.kompetisiEventId', '=', 'dat_kompetisi_events.id')
            ->join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'blacklist_teams.*',
                'dat_kompetisi_events.leader',
                'dat_kompetisi_events.namaTeam',
                'dat_sekolahs.namaSekolah',
                'datkompetisis.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            )->where('statusBlackList', 'true');
        if ($dataUser->role == 2 && $dataWilaya) {
            $data->where('dat_series.name', $dataWilaya->namaWilayah);
        }
        $data = $data->get();
        // var_dump($data);
        $this->atributes['listKompetisiEvents'] = $data;
        return view('pages.admin.kompetisiTournament.blacklist', $this->atributes);
    }
    public function teamBlacklistForm()
    {
        $dataUser = Auth::user();
        $dataWilaya = datWilayah::find($dataUser->wilayah);
        $data = datKompetisiEvent::join('dat_sekolahs', 'dat_kompetisi_events.idSekolah', '=', 'dat_sekolahs.id')
            ->join('datkompetisis', 'dat_kompetisi_events.idKompetisi', '=', 'datkompetisis.id')
            ->join('dat_series', 'dat_kompetisi_events.idSeries', '=', 'dat_series.id')
            ->join('dat_seasons', 'datkompetisis.seasonId', '=', 'dat_seasons.id')
            ->select(
                'dat_kompetisi_events.*',
                'dat_kompetisi_events.id as kompetisiEventId',
                'dat_sekolahs.namaSekolah',
                'datkompetisis.name as kompetisiName',
                'dat_seasons.name as seasonName',
                'dat_series.name as seriesName'
            );
        if ($dataUser->role == 2 && $dataWilaya) {
            $data->where('dat_series.name', $dataWilaya->namaWilayah);
        }
        $data = $data->get();

        $this->atributes['kompetisiEvent'] = $data;
        return view('pages.admin.kompetisiTournament.formBlackList', $this->atributes);
    }
    public function teamBlacklistStore(Request $req)
    {
        DB::beginTransaction();
        try {
            $data = $req->validate([
                'kompetisiEventIds' => 'required|array',
                'startDateBlackList' => 'required|date',
                'endStartDateBlackList' => 'required|date|after_or_equal:startDateBlackList',
            ]);
            foreach ($data['kompetisiEventIds'] as $kompetisiEventId) {
                blacklistTeam::create([
                    'kompetisiEventId' => $kompetisiEventId,
                    'statusBlackList' => 'true',
                    'startDateBlackList' => $data['startDateBlackList'],
                    'endStartDateBlackList' => $data['endStartDateBlackList'],
                    'createdby' => Auth::id(),
                ]);
            }
            DB::commit();
            return redirect('admin/kompetisi/black_list')->with('success', 'Tim berhasil diblacklist.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/kompetisi/black_list')->with('error', 'Gagal memblacklist tim: ' . $ex->getMessage());
        }
    }
    public function teamBlacklistDelete($id)
    {
        try {
            $blacklist = blacklistTeam::find($id);
            if (!$blacklist) {
                return redirect('admin/kompetisi/black_list')->with('error', 'Data blacklist tidak ditemukan.');
            }
            $blacklist->statusBlackList = 'false';
            $blacklist->save();
            return redirect('admin/kompetisi/black_list')->with('success', 'Data blacklist berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/kompetisi/black_list')->with('error', 'Gagal menghapus data blacklist: ' . $ex->getMessage());
        }
    }
    public function deleteMasterUser($id)
    {
        try {
            $user = datuser::find($id);
            if (!$user) {
                return redirect('admin/masterUser/list')->with('error', 'User tidak ditemukan.');
            }
            $user->delete();
            return redirect('admin/masterUser/list')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/masterUser/list')->with('error', 'Gagal menghapus user: ' . $ex->getMessage());
        }
    }
    public function listPositions()
    {
        $data = datPosisi::get();
        $this->atributes['data'] = $data;
        return view("pages.admin.position.list", $this->atributes);
    }
    public function formPositions()
    {
        return view("pages.admin.position.form",  $this->atributes);
    }
    public function createPositions(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                'namaPosisi' => 'required|string',
            ]);
            datPosisi::create($data);
            DB::commit();
            return redirect('admin/positions/list')->with('success', 'success created data.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('admin/positions/form')->with('error', 'Gagal create position: ' . $ex->getMessage());
        }
    }
    public function deletePositions(Request $req)
    {
        try {
            $position = datPosisi::find($req->get('id'));
            if (!$position) {
                return redirect('admin/positions/list')->with('error', 'position tidak ditemukan.');
            }
            $position->delete();
            return redirect('admin/positions/list')->with('success', 'position berhasil dihapus.');
        } catch (\Exception $ex) {
            return redirect('admin/positions/list')->with('error', 'Gagal menghapus position: ' . $ex->getMessage());
        }
    }
}

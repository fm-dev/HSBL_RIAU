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
            ]);

            datSeason::create([
                'name' => $data['name_sesion'],
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
        return view('pages.admin.users.listUsers', $this->atributes);
    }
    public function viewAddUsers()
    {
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
                'kompetisi_id' => 'nullable',
                'series_id' => 'nullable',
                'session_id' => 'nullable',
                'asal_sekolah' => 'nullable|string'
            ]);
            $req['role'] =3;
            $req['status'] = 'active';
            $req['wilayah'] = Auth::user()->wilayah;
            $req['createdby'] =  Auth::user()->username;
            $req['password'] = bcrypt($req['password']);
            $req['alamat'] = $req['asal_sekolah'];
            datuser::create($req);
            DB::commit();
            return redirect('admin/masterUser/list')->with('success', 'User berhasil ditambahkan.');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $ex->getMessage());
        }   

    }
}

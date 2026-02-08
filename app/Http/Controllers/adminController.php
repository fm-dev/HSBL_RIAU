<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\datMenuParent;
use App\Models\datMenuChild;
use App\Models\datWilayah;
use App\Models\datuser;
use App\Models\datrefrole;

class adminController extends Controller
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
        // Get all menu children berdasarkan roleId
        $menuChildren = datMenuChild::where('roleId', $roleId)->get();

        // Get unique parent IDs
        $parentIds = $menuChildren->pluck('parentId')->unique();

        // Get parent menus
        $menuParents = datMenuParent::whereIn('id', $parentIds)->get();

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
    public function index()
    {
        return view('pages.admin.index',$this->atributes);
    }
    public function detailProfile()
    {
        return view('pages.admin.profile.profile',$this->atributes);
    }
    public function dataAdminView()
    {
        return view('pages.admin.profile.dataAdmin',$this->atributes);
    }
    public function dataUserView()
    {
        return view('pages.admin.profile.dataUser',$this->atributes);
    }
    public function dataListTeam()
    {
        return view("pages.admin.team.teamList", $this->atributes);
    }
    public function dataListSeasons()
    {
        return view("pages.admin.events.listDataSeasons", $this->atributes);
    }
    public function dataListKompetisi()
    {
        return view("pages.admin.events.listDataKompetisi", $this->atributes);
    }
    public function dataListSeries()
    {
        return view("pages.admin.events.listDataSeries", $this->atributes);
    }
    public function dataListSekolah()
    {
        return view("pages.admin.events.listDataSekolah", $this->atributes);
    }
    public function dataListScore()
    {
        return view("pages.admin.eventsScore.listScore", $this->atributes);
    }
    public function viewDataAdmin()
    {
        // Get all users with role 1 or 2 (Super Admin atau Admin)
        $admins = datuser::whereIn('role', [1, 2])->get();
        $this->atributes['admins'] = $admins;
        
        return view("pages.admin.manageAdmin", $this->atributes);
    }
    public function formCreateAdmin()
    {
        $wilayahs = datWilayah::all();
        $roles = datrefrole::all();
        $this->atributes['wilayahs'] = $wilayahs;
        $this->atributes['roles'] = $roles;
        return view("pages.admin.formCreateAdmin", $this->atributes);
    }
    public function createAdmin(Request $req)
    {
        try {
            $data = $req->validate([
                'username'  => 'required|string|max:255|unique:datusers,username',
                'password'  => 'required|string|min:8',
                'email'     => 'required|email|max:255|unique:datusers,email',
                'phone'     => 'required|string|max:15|unique:datusers,phone',
                'role'      => 'required|integer|exists:datrefroles,id',
                'status'    => 'required|string|in:active,inactive',
                'alamat'    => 'required|string|max:255',
                'wilayah'   => 'required|integer|exists:dat_wilayahs,id',
            ]);

            $data['password'] = Hash::make($data['password']);
            $data['createdby'] = Auth::user()->username;

            datuser::create($data);

            return redirect('/admin/manage_admin')->with('success', 'Admin berhasil dibuat!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('portal.admin.login')->with('success', 'Anda berhasil logout');
        } catch (\Exception $e) {
            return redirect()->route('portal.admin.login')->with('error', 'Terjadi kesalahan saat logout: ' . $e->getMessage());
        }
    }

    /**
     * Delete an admin/user by id
     */
    public function destroy($id)
    {
        try {
            $user = datuser::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }

            // Prevent deleting currently authenticated user
            if (Auth::check() && Auth::id() == $user->id) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus user yang sedang aktif.');
            }

            $user->delete();

            return redirect()->back()->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus user: ' . $e->getMessage());
        }
    }

    /**
     * Show edit form for a user
     */
    public function edit($id)
    {
        $admin = datuser::find($id);

        if (!$admin) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $wilayahs = datWilayah::all();
        $roles = datrefrole::all();

        $this->atributes['admin'] = $admin;
        $this->atributes['wilayahs'] = $wilayahs;
        $this->atributes['roles'] = $roles;

        return view('pages.admin.formEditAdmin', $this->atributes);
    }

    /**
     * Update user data
     */
    public function update(Request $req, $id)
    {
        try {
            $user = datuser::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }

            $data = $req->validate([
                'username'  => 'required|string|max:255|unique:datusers,username,' . $id,
                'password'  => 'nullable|string|min:8',
                'email'     => 'required|email|max:255|unique:datusers,email,' . $id,
                'phone'     => 'required|string|max:15|unique:datusers,phone,' . $id,
                'role'      => 'required|integer|exists:datrefroles,id',
                'status'    => 'required|string|in:active,inactive',
                'alamat'    => 'required|string|max:255',
                'wilayah'   => 'required|integer|exists:dat_wilayahs,id',
            ]);

            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            $data['modby'] = Auth::user()->username ?? null;

            $user->fill($data);
            $user->save();

            return redirect()->route('admin.manage_admin')->with('success', 'User berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * List all roles
     */
    public function rolesIndex()
    {
        $roles = datrefrole::all();
        $this->atributes['rolesList'] = $roles;
        return view('pages.admin.manageRoles', $this->atributes);
    }

    /**
     * Show edit form for role
     */
    public function editRole($id)
    {
        $role = datrefrole::find($id);
        if (!$role) {
            return redirect()->back()->with('error', 'Role tidak ditemukan.');
        }
        $this->atributes['role'] = $role;
        return view('pages.admin.formEditRole', $this->atributes);
    }

    /**
     * Update role
     */
    public function updateRole(Request $req, $id)
    {
        try {
            $role = datrefrole::find($id);
            if (!$role) {
                return redirect()->back()->with('error', 'Role tidak ditemukan.');
            }

            $data = $req->validate([
                'nama_role' => 'required|string|max:255|unique:datrefroles,nama_role,' . $id,
            ]);

            $data['modby'] = Auth::user()->username ?? null;
            $role->fill($data);
            $role->save();

            return redirect()->route('admin.manage_roles')->with('success', 'Role berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete role if not used by users
     */
    public function deleteRole($id)
    {
        try {
            $role = datrefrole::find($id);
            if (!$role) {
                return redirect()->back()->with('error', 'Role tidak ditemukan.');
            }

            // prevent deletion if any users have this role
            $hasUsers = datuser::where('role', $id)->exists();
            if ($hasUsers) {
                return redirect()->back()->with('error', 'Role tidak dapat dihapus karena masih digunakan oleh user.');
            }

            $role->delete();
            return redirect()->back()->with('success', 'Role berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus role: ' . $e->getMessage());
        }
    }

    /**
     * List all menus (parent + children grouped by parent)
     */
    public function menusIndex()
    {
        $menuParents = datMenuParent::with('children')->get();
        $this->atributes['menuParents'] = $menuParents;
        $this->atributes['roles'] = datrefrole::all();
        return view('pages.admin.manageMenus', $this->atributes);
    }

    /**
     * Show form to create parent menu
     */
    public function createMenuParent()
    {
        $this->atributes['roles'] = datrefrole::all();
        return view('pages.admin.formCreateMenuParent', $this->atributes);
    }

    /**
     * Store parent menu
     */
    public function storeMenuParent(Request $req)
    {
        try {
            $data = $req->validate([
                'labelMenu' => 'required|string|max:255',
                'path' => 'required|string|max:255',
                'roleId' => 'required|integer|exists:datrefroles,id',
            ]);

            datMenuParent::create($data);

            return redirect()->route('admin.manage_menus')->with('success', 'Menu induk berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show form to create child menu
     */
    public function createMenuChild()
    {
        $this->atributes['menuParents'] = datMenuParent::all();
        $this->atributes['roles'] = datrefrole::all();
        return view('pages.admin.formCreateMenuChild', $this->atributes);
    }

    /**
     * Store child menu
     */
    public function storeMenuChild(Request $req)
    {
        try {
            $data = $req->validate([
                'labelMenu' => 'required|string|max:255',
                'path' => 'required|string|max:255',
                'parentId' => 'required|integer|exists:dat_menu_parents,id',
                'roleId' => 'required|integer|exists:datrefroles,id',
            ]);

            datMenuChild::create($data);

            return redirect()->route('admin.manage_menus')->with('success', 'Menu anak berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Edit parent menu
     */
    public function editMenuParent($id)
    {
        $menuParent = datMenuParent::find($id);
        if (!$menuParent) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }
        $this->atributes['menuParent'] = $menuParent;
        $this->atributes['roles'] = datrefrole::all();
        return view('pages.admin.formEditMenuParent', $this->atributes);
    }

    /**
     * Update parent menu
     */
    public function updateMenuParent(Request $req, $id)
    {
        try {
            $menuParent = datMenuParent::find($id);
            if (!$menuParent) {
                return redirect()->back()->with('error', 'Menu tidak ditemukan.');
            }

            $data = $req->validate([
                'labelMenu' => 'required|string|max:255',
                'path' => 'required|string|max:255',
                'roleId' => 'required|integer|exists:datrefroles,id',
            ]);

            $menuParent->fill($data);
            $menuParent->save();

            return redirect()->route('admin.manage_menus')->with('success', 'Menu berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete parent menu and all its children
     */
    public function deleteMenuParent($id)
    {
        try {
            $menuParent = datMenuParent::find($id);
            if (!$menuParent) {
                return redirect()->back()->with('error', 'Menu tidak ditemukan.');
            }

            datMenuChild::where('parentId', $id)->delete();
            $menuParent->delete();

            return redirect()->back()->with('success', 'Menu berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus menu: ' . $e->getMessage());
        }
    }

    /**
     * Edit child menu
     */
    public function editMenuChild($id)
    {
        $menuChild = datMenuChild::find($id);
        if (!$menuChild) {
            return redirect()->back()->with('error', 'Menu anak tidak ditemukan.');
        }
        $this->atributes['menuChild'] = $menuChild;
        $this->atributes['menuParents'] = datMenuParent::all();
        $this->atributes['roles'] = datrefrole::all();
        return view('pages.admin.formEditMenuChild', $this->atributes);
    }

    /**
     * Update child menu
     */
    public function updateMenuChild(Request $req, $id)
    {
        try {
            $menuChild = datMenuChild::find($id);
            if (!$menuChild) {
                return redirect()->back()->with('error', 'Menu anak tidak ditemukan.');
            }

            $data = $req->validate([
                'labelMenu' => 'required|string|max:255',
                'path' => 'required|string|max:255',
                'parentId' => 'required|integer|exists:dat_menu_parents,id',
                'roleId' => 'required|integer|exists:datrefroles,id',
            ]);

            $menuChild->fill($data);
            $menuChild->save();

            return redirect()->route('admin.manage_menus')->with('success', 'Menu anak berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete child menu
     */
    public function deleteMenuChild($id)
    {
        try {
            $menuChild = datMenuChild::find($id);
            if (!$menuChild) {
                return redirect()->back()->with('error', 'Menu anak tidak ditemukan.');
            }

            $menuChild->delete();
            return redirect()->back()->with('success', 'Menu anak berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus menu: ' . $e->getMessage());
        }
    }

    /**
     * List all wilayah
     */
    public function wilayahIndex()
    {
        $wilayahs = datWilayah::all();
        $this->atributes['wilayahs'] = $wilayahs;
        return view('pages.admin.manageWilayah', $this->atributes);
    }

    /**
     * Show form to create wilayah
     */
    public function createWilayah()
    {
        return view('pages.admin.formCreateWilayah', $this->atributes);
    }

    /**
     * Store wilayah
     */
    public function storeWilayah(Request $req)
    {
        try {
            $data = $req->validate([
                'namaWilayah' => 'required|string|max:255|unique:dat_wilayahs,namaWilayah',
            ]);

            datWilayah::create($data);

            return redirect()->route('admin.manage_wilayah')->with('success', 'Wilayah berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show form to edit wilayah
     */
    public function editWilayah($id)
    {
        $wilayah = datWilayah::find($id);
        if (!$wilayah) {
            return redirect()->back()->with('error', 'Wilayah tidak ditemukan.');
        }
        $this->atributes['wilayah'] = $wilayah;
        return view('pages.admin.formEditWilayah', $this->atributes);
    }

    /**
     * Update wilayah
     */
    public function updateWilayah(Request $req, $id)
    {
        try {
            $wilayah = datWilayah::find($id);
            if (!$wilayah) {
                return redirect()->back()->with('error', 'Wilayah tidak ditemukan.');
            }

            $data = $req->validate([
                'namaWilayah' => 'required|string|max:255|unique:dat_wilayahs,namaWilayah,' . $id,
            ]);

            $wilayah->fill($data);
            $wilayah->save();

            return redirect()->route('admin.manage_wilayah')->with('success', 'Wilayah berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete wilayah if not used by users
     */
    public function deleteWilayah($id)
    {
        try {
            $wilayah = datWilayah::find($id);
            if (!$wilayah) {
                return redirect()->back()->with('error', 'Wilayah tidak ditemukan.');
            }

            // prevent deletion if any users have this wilayah
            $hasUsers = datuser::where('wilayah', $id)->exists();
            if ($hasUsers) {
                return redirect()->back()->with('error', 'Wilayah tidak dapat dihapus karena masih digunakan oleh user.');
            }

            $wilayah->delete();
            return redirect()->back()->with('success', 'Wilayah berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus wilayah: ' . $e->getMessage());
        }
    }
}
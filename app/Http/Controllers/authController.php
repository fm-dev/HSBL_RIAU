<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class authController extends Controller
{
    //
    public function registrasiUser(Request $req)
    {
        try{
            $data = $req->validate([
                'username' => ['required','string'],
                'password' => ['required','string'],
                'email' => ['required','email'],
                'phone'=>['required','string'],
                'alamat' =>['required','string'],
            ]);

            $data['password'] = Hash::make($data['password']);

            $data['role'] = '211';

            $data['status'] = '1';

            $data['createdby'] = 'app.system';

            datuser::create($data);

            return redirect('login')->with('success','Berhasil Login');

        }catch(Exception $e){
            return redirect()->route('registrasi')->with('error','Terjadi kesalahan'.$e->getMessage());
        }
    }
    public function registrasiAdmin(Request $req)
    {
        try{
            $data = $req->validate([
                'username' => ['required','string'],
                'password' => ['required','string'],
                'key' => ['required','string']
            ]);

            if($data['key'] == "123"){

                $checkUser = datuser::where('username', $data['username'])->first();

                if ($checkUser) {
                    return redirect('/portal/admin/registrasi')->with('error', 'Akun ini sudah terdaftar');
                }

                $data['password'] = Hash::make($data['password']);

                $data['role'] = '222';

                $data['email'] = 'Admin';

                $data['phone'] = 'Admin';

                $data['alamat'] = 'Admin';

                $data['status'] = '1';

                $data['createdby'] = 'app.system';

                datuser::create($data);

                return redirect('/portal/admin/login')->with('success','Berhasil Login');
            }
            else{

                return redirect('/portal/admin/registrasi')->with('error','Key anda salah');

            }
        }catch(Exception $e){
            return redirect()->route('/portal/admin/registrasi')->with('error','Terjadi kesalahan'.$e->getMessage());
        }
    }
    public function loginAdmin(Request $req){
        try
        {
            $data = $req->validate([
                'name' => ['required','string'],
                'password' => ['required','string']
            ]);

            $user = datuser::where('username', $req->name)->first();

            if($user && hash::check($req->password,$user->password)){
                Auth::login($user);
                return redirect()->route('portal.admin.index')->with('succes', 'berhasil login');
            }
            else{
                return redirect()->route('portal.admin.login')->with('error', 'username atau password salah');
            }
        }
        catch(Exception $ex)
        {
            return redirect()->route('login')->with('error','Terjadi kesalahan'.$e->getMessage());

        }
    }
    public function login(Request $req){
        try
        {
            $data = $req->validate([
                'username' => ['required','string'],
                'password' => ['required','string']
            ]);

            $user = datuser::where('username', $req->username)->first();

            if($user && hash::check($req->password,$user->password)){
                Auth::login($user);
                return redirect()->route('index')->with('succes', 'berhasil login');
            }
            else{
                return redirect()->route('login')->with('error', 'username atau password salah');
            }
        }
        catch(Exception $ex)
        {
            return redirect()->route('login')->with('error','Terjadi kesalahan'.$e->getMessage());

        }
    }
    public function portal_login_admin(){
        return view("pages.admin.portalLoginAdmin");
    }
    public function portal_registrasi_admin(){
        return view("pages.admin.portalRegisterAdmin");
    }

}

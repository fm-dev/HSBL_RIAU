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
}

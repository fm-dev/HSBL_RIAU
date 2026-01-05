<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datSeason;
class EventController extends Controller
{
    //
    public function CreatedSeasons(Request $req){
        try{
            $data = $req->validate([
                'name' => 'string|required'
            ]);

            //get data user 
            $user = "created by systems";

            $data['createdby'] = $user;

            datSeason::create($data);

            return redirect()->route('portal.admin.dataListSeasons')->with('succes','add data successfuly');

        }   
        catch(Exception $ex){

             return redirect()->route('login')->with('error','Terjadi kesalahan'.$ex->getMessage());
        }
    }
    public function ViewAddSeasons(){
        return view("pages.admin.events.seasions.createdSession");
    }
}

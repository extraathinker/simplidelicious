<?php

namespace App\Http\Controllers;

use App\Models\userdata;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getsession(){
        $session = session()->all();
        echo "<pre>";
        print_r($session);
        echo "</pre>";

    }

    public function setsession(Request $request){
        session()->put('user','normal');
        return redirect('/');
    }

    public function destroysession(){
        $sess = session()->get('user');
        if ($sess == 'normal'){
            $user = userdata::where('username','=',session()->get('username'))->get()[0];
            $id = $user['userId'];
            $use = userdata::find($id);
            $use->status = 0;
            $use->update();
        }
        session()->forget('user');
        session()->forget('username');
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\userdata;
use App\Models\Recipes;

class LoginController extends Controller
{
    public function login(){
        return view('frontend.login');
    }

    public function signup(){
        return view('frontend.signup');
    }

    public function authenticate(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );
        if (userdata::where('username','=',$request['username'])->exists()){
            $user = userdata::where('username','=',$request['username'])->get()->toArray()[0];
            if ($user['password'] == md5($request['password'])){
                if ($user['role'] == 'admin'){
                    session()->put('user','admin');
                    session()->put('username',$request['username']);
                }elseif ($user['role'] == 'normal'){
                    session()->put('user','normal');
                    session()->put('username',$request['username']);
                    $user = userdata::where('username','=',session()->get('username'))->get()[0];
                    $id = $user['userId'];
                    $use = userdata::find($id);
                    $use->status = 1;
                    $use->update();
                }
                $recipes = Recipes::all();
                $categories = Category::all();
                $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
                $data = compact('categories','recent','recipes');
                return redirect('/')->with($data);
            }else{
                $error = 'Password is incorrect !!!';
                $data = compact('error');
                return view('frontend.error')->with($data);
            }
        }else{
            $error = 'Username does not exists !!!';
            $data = compact('error');
            return view('frontend.error')->with($data);
        }
    }

    public function register(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'dateofbirth' => 'required | date',
                'email' => 'required | email',
                'password' => 'required',
            ]
        );
        $user = new userdata;
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->username = $request['username'];
        if (!is_null($request['role'])){
            $user->role = $request['role'];
        }else{
            $user->role = 'normal';
        }
        $user->city = $request['city'];
        $user->state = $request['state'];
        $user->country = $request['country'];
        $user->dateofbirth = $request['dateofbirth'];
        $user->email = $request['email'];
        $user->password = md5($request['password']);
        $user->save();
        $recipes = Recipes::all();
        $categories = Category::all();
        $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
        $data = compact('categories','recent','recipes');
        return view('frontend.index')->with($data);
    }

    public function userdata() {
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $users = userdata::all();
                $data = compact('users');
                return view('frontend.admin.userdata')->with($data);
            }else{
                return redirect('/');
            }
        }
    }

    public function deleteuser($id) {
        userdata::find($id)->delete();
        return redirect('/admin/userdata');
    }

    public function edituser(Request $request){
        $users = userdata::where('userId','=',$request['id'])->get();
        $data = compact('users');
        return view('frontend.admin.edituser')->with($data);
    }

    public function updateuser($id,Request $request){
        $user = userdata::find($id);
        $user->name = $request['name'];
        $user->gender = $request['gender'];
        $user->username = $request['username'];
        $user->role = $request['role'];
        $user->city = $request['city'];
        $user->state = $request['state'];
        $user->country = $request['country'];
        $user->dateofbirth = $request['dateofbirth'];
        $user->email = $request['email'];
        $user->password = md5($request['password']);
        $user->update();
        return redirect('/admin/userdata');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function form(){
        return view('auth');
    }
    function auth(Request $request){
        $user = User::where('login', $request->login)->first();
        if ($user){
            if (password_verify($request->password, $user->password)){
                session(['userAuth'=>'true']);
                session(['login'=>$request->login]);
                return redirect('/');
            }
        }
        else{
            return view('autherror');
        }
    }
    function logout(){
        session()->flush();
        return redirect('/');
    }
}

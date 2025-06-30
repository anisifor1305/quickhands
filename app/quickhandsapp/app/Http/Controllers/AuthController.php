<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function form(){
        return view('auth', ['invalidData'=>null]);
    }
    function auth(Request $request){
        $user = User::where('login', $request->login)->first();
        if ($user){
            if (password_verify($request->password, $user->password)){
                if ($user->banned){
                    return view('banned');
                } else{
                session(['userAuth'=>'true']);
                session(['login'=>$request->login]);
                return redirect('/');
                }
            }
            else{
                return view('auth', ['invalidData'=>true]);
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

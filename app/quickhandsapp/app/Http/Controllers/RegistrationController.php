<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class RegistrationController extends Controller
{
    function registration() {
        return view('registration');
    }
    function createUser(Request $request){
        $user = new User();
        $user->login=$request->login;
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->password=password_hash($request->password, PASSWORD_BCRYPT);
        $user->is_admin=false;
        $user->save();
        session(['userAuth'=>'true']);
        session(['login'=>$request->login]);
        return redirect('/');
    }
}

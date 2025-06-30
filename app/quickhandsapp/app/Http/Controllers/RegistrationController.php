<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class RegistrationController extends Controller
{
    function registration() {
        return view('registration', ['invalidDataPWD'=>false, 'invalidDataLogin'=>false, 'error'=>null]);
    }
    function createUser(Request $request){
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@#$%^&*()]).{8,}$/';
        $loginRegex = '/^[a-zA-Z0-9]+$/';
        if (!preg_match($passwordRegex, $request->password) and !preg_match($loginRegex, $request->login)){
            return view('registration', ['invalidDataPWD'=>true, 'invalidDataLogin'=>true, 'error'=>null]);
        }
        else if (!preg_match($passwordRegex, $request->password)){
            return view('registration', ['invalidDataPWD'=>true, 'invalidDataLogin'=>false, 'error'=>null]);
        }
        else if (!preg_match($loginRegex, $request->login)){
            return view('registration', ['invalidDataLogin'=>true, 'invalidDataPWD'=>false, 'error'=>null]);
        }
        else{
            try{
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
            return redirect('/howpage');
            }
            catch(Exception $e){
                return view('registration', ['error'=>'Логин или/и email не уникален', 'invalidDataPWD'=>false, 'invalidDataLogin'=>false]);
            }
        }

    }
}

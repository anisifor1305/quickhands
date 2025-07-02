<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\FLPub;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function showProfile(string $id) {
        $user = User::where('id', $id)->first();
        $bal =  User::where('id', auth()->id())->first()->balance;
        if ($user->is_verified){
            $status = 'Верифицирован';
        }
        else{
            $status = 'Не верифицирован. Будьте аккуратнее.';
        }
        return view('userProfile', ['firstname'=>$user->firstname, 'lastname'=>$user->lastname, 'status'=>$status, 'about'=>$user->about,
    'balance'=>$user->balance, 'lore'=>$user->lore]);

    }
    function personalProfile() {
        $user = User::where('id', auth()->id())->first();
        $firstname = $user->firstname;
        $lastname = $user->lastname;
        $passport_data = $user->passport_data;
        $about = $user->about;
        $balance = $user->balance;
        $user_advs = Advert::where('owner_id', $user->id)->get();
        $user_FLPubs = FLPub::where('owner_id', $user->id)->get();
        if (count($user_advs)==0){
            $user_advs = null;
        }
        if (count($user_FLPubs)==0){
            $user_FLPubs = null;
        }
        return view('personalProfile', ['firstname'=>$firstname, 'lastname'=>$lastname, 'passport_data'=>$passport_data, 'about'=>$about, 'balance'=>$balance,
    'FLPubs'=>$user_FLPubs, 'advs'=>$user_advs]);

    }
    function banUser(Request $request) {
        $user = User::where('id', $request->userid)->first();
        $user->banned=1;
        $user->save();
        return redirect('/');
    }
        function unbanUser(Request $request) {
        $user = User::where('id', $request->userid)->first();
        $user->banned=0;
        $user->save();
        return redirect('/');
    }
}

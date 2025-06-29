<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function showProfile(string $id) {
        $user = User::where('id', $id)->first();
        $bal = User::where('login', session('login'))->first()->balance;
        if ($user->is_verified){
            $status = 'Верифицирован';
        }
        else{
            $status = 'Не верифицирован. Будьте аккуратнее.';
        }
        return view('userProfile', ['firstname'=>$user->firstname, 'lastname'=>$user->lastname, 'status'=>$status, 'lore'=>$user->user_lore,
    'balance'=>$user->balance]);

    }
}

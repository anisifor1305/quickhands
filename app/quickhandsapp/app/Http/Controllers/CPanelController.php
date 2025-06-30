<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CPanelController extends Controller
{
    function index() {
        $login = session('login');
        if (User::where('login', $login)->first()->is_admin){
            return view('cpanel');
        }
        else{
            return view('accessError');
        }
    }
}

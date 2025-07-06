<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $bal = User::where('id', auth()->id())->first()->balance;
        return view('home', ['balance'=>$bal]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
        function index(){
        $bal = User::where('login', session('login'))->first()->balance;
        return view('employer', ['balance'=>$bal]);
    }
}

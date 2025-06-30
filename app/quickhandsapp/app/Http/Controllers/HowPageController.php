<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowPageController extends Controller
{
    function index(){
        return view('howpage');
    }
}

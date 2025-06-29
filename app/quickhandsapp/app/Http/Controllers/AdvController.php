<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use App\Models\User;

class AdvController extends Controller
{
    function index(){
        $bal = User::where('login', session('login'))->first()->balance;
        return view('newadv', ['balance'=>$bal]);
    }
    function newAdv(Request $request) {
        $bal = User::where('login', session('login'))->first()->balance;
        $login = session('login');
        $name = $request->name;
        $lore = $request->lore;
        $price = $request->price;
        $type = $request->type;
        $adv = new Advert();
        $adv->name=$name;
        $adv->type=$type;
        $adv->price=$price;
        $adv->lore=$lore;
        $adv->owner_id = User::where('login', $login)->first()->id;
        $adv->save();
        return view('advSuccess', ['balance'=>$bal]);
    }
        function showAdv(string $id) {
        $bal = User::where('login', session('login'))->first()->balance;
        $adv = Advert::where('id', $id)->first();
        $ownerId = $adv->owner_id;
        $ownerName = User::where('id', $ownerId)->first()->firstname;
        return view('advProfile', ['name'=>$adv->name, 'lore'=>$adv->lore, 'price'=>$adv->price, 'owner_id'=>$adv->owner_id, 'type'=>$adv->type, 'owner_name'=>$ownerName, 'balance'=>$bal]);

    }

    function getAdvs() {
        $advs = Advert::all();
        $bal = User::where('login', session('login'))->first()->balance;
        return view('adverts', ['advs'=>$advs, 'balance'=>$bal]);
    }
}

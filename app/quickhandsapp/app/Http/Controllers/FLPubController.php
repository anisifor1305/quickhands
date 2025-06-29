<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FLPub;

class FLPubController extends Controller
{
    function index(){
        $bal = User::where('login', session('login'))->first()->balance;
        return view('newFLPub', ['balance'=>$bal]);
    }
    function newFLPub(Request $request) {
        $login = session('login');
        $bal = User::where('login', session('login'))->first()->balance;
        $name = $request->name;
        $lore = $request->lore;
        $maxprice = $request->maxprice;
        $minprice = $request->minprice;
        $type = $request->type;
        $FLPub = new FLPub();
        $FLPub->name=$name;
        $FLPub->type=$type;
        $FLPub->maxprice=$maxprice;
        $FLPub->minprice=$minprice;
        $FLPub->lore=$lore;
        $FLPub->owner_id = User::where('login', $login)->first()->id;
        $FLPub->save();
        return view('advSuccess', ['balance'=>$bal]);
    }
    function getFLPubs() {
        $bal = User::where('login', session('login'))->first()->balance;
        $FLPubs = FLPub::all();
        return view('freelancers', ['FLPubs'=>$FLPubs,'balance'=>$bal]);
    }
    function showFLPub(string $id) {
        $bal = User::where('login', session('login'))->first()->balance;
        $flpub = FLPub::where('id', $id)->first();
        $ownerId = $flpub->owner_id;
        $ownerName = User::where('id', $ownerId)->first()->firstname;
        $ownerLastName = User::where('id', $ownerId)->first()->lastname;
        return view('FLPubProfile', ['name'=>$flpub->name, 'lore'=>$flpub->lore, 'minprice'=>$flpub->minprice, 'maxprice'=>$flpub->maxprice,  'owner_id'=>$flpub->owner_id, 'type'=>$flpub->type, 'owner_name'=>$ownerName, 'owner_lastname'=>$ownerLastName,
    'balance'=>$bal]);

    }
}

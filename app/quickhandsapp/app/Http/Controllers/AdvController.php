<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use App\Models\User;

class AdvController extends Controller
{
    function index(){
        $bal =  User::where('id', auth()->id())->first()->balance;
        return view('newadv', ['balance'=>$bal]);
    }
    function newAdv(Request $request) {

        $bal = User::where('id', auth()->id())->first()->balance;
        $name = $request->name;
        $lore = $request->lore;
        $price = $request->price;
        $type = $request->type;
        if ( User::where('id', auth()->id())->first()->count_adv<3){
            $adv = new Advert();
            $adv->name=$name;
            $adv->type=$type;
            $adv->price=$price;
            $adv->lore=$lore;
            $adv->owner_id = User::where('id', auth()->id())->first()->id;
            $adv->save();
            $user =  User::where('id', auth()->id())->first();
            $user->count_adv=$user->count_adv+1;
            $user->save();
            return view('advSuccess', ['balance'=>$bal]);
        }

        else{
            return view('countAdvError');
        }
    }
        function showAdv(string $id) {
        $bal = User::where('id', auth()->id())->first()->balance;
        $adv = Advert::where('id', $id)->first();
        $ownerId = $adv->owner_id;
        $ownerName = User::where('id', $ownerId)->first()->firstname;
        return view('advProfile', ['id'=>$id, 'name'=>$adv->name, 'lore'=>$adv->lore, 'price'=>$adv->price, 'owner_id'=>$adv->owner_id, 'type'=>$adv->type, 'owner_name'=>$ownerName, 'balance'=>$bal]);

    }

    function getAdvs() {
        $advs = Advert::all();
        $bal = User::where('id', auth()->id())->first()->balance;
        return view('adverts', ['advs'=>$advs, 'balance'=>$bal]);
    }
    function deleteAdv(string $id){
        $adv = Advert::where('id', $id)->first();
        $owner_id= User::where('id', auth()->id())->first()->id;
        $user = User::where('id', auth()->id())->first();
        if ($adv->owner_id==$owner_id){
            Advert::destroy($id);
        }
        $user->count_adv=$user->count_adv-1;
        return redirect('/profile');
    }
}

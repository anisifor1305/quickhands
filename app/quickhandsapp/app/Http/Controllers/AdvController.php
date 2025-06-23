<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use App\Models\User;

class AdvController extends Controller
{
    function newAdv(Request $request) {
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
        return view('advSuccess');
        #редирект на успешно созданную заявку
    }
        function showAdv(string $id) {
        $adv = Advert::where('id', $id)->first();
        $ownerId = $adv->owner_id;
        $ownerName = User::where('id', $ownerId)->first()->firstname;
        return view('advProfile', ['name'=>$adv->name, 'lore'=>$adv->lore, 'price'=>$adv->price, 'owner_id'=>$adv->owner_id, 'type'=>$adv->type, 'owner_name'=>$ownerName]);

    }

    function getAdvs() {
        $advs = Advert::all();
        return view('adverts', ['advs'=>$advs]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Reply;
use Exception;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    function showReplyForm(string $id) {
        return view('newReply', ['id'=>$id]);
    }
    function newReply(Request $request, string $id) {
        try{
            $reply = new Reply();
            $reply->from_user=auth()->id();
            $reply->to_adv=$id;
            $reply->text=$request->text;
            $reply->price=$request->price;
            $reply->save();
            return redirect('/');
        } 
        catch (Exception $e){
            return response( $e->getMessage());
            return view('defaultError');
        }
    }
    function showReplies(string $id) {
        $adv = Advert::where('id', $id)->first();
        if ($adv->owner_id==auth()->id()){
            $replies = Reply::where('to_adv', $id)->get();
            return view('replies', ['replies'=>$replies]);
        } else{
            return view('accessError');
        }
    }
}

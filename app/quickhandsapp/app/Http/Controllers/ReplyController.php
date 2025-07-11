<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Deal;
use App\Models\Reply;
use App\Models\User;
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
            return redirect('/adverts');
        } 
        catch (Exception $e){
            return response( $e->getMessage());
            return view('defaultError');
        }
    }
    function showReplies(string $id) {
        $adv = Advert::where('id', $id)->first();
        $isDeal = Deal::where('adv', $adv->id)->exists();
        if ($adv->owner_id==auth()->id()){
            $replies = Reply::where('to_adv', $id)->get();
            return view('replies', ['replies'=>$replies, 'isDeal'=>$isDeal]);
        } else{
            return view('accessError');
        }
    }
    function confirmReply(string $id) {
        $reply= Reply::where('id', $id)->first();
        $adv = Advert::where('id', $reply->to_adv)->first();
        if ($reply and $adv and Advert::where('id', $reply->to_adv)->first()->owner_id==auth()->id()){
            $employer = User::where('id', Advert::where('id', $reply->to_adv)->first()->owner_id)->first();
            $freelancer = User::where('id', $reply->from_user)->first();
            if( $employer and $freelancer){
                if($employer->balance>=$reply->price){
                    $reply->status=='confirmed';
                    $reply->save();
                    $amount = $reply->price;
                    $employer->balance-=$amount;
                    $employer->save();
                    $deal = Deal::create([
                    'freelancer' => $freelancer->id,
                    'employer' => $employer->id,
                    'amount' => $amount,
                    'adv'=>$adv->id,
                    'status'=>'created',
                    ]);
                    return view('replyConfirmed');
                } else{
                    return view('notEnoughBalance');
                }
            } else{
                return view('defaultError');
            }
        } else{
            return view('accessError');
        }
    }
}

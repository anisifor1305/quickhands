<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Fecades\Redirect;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index(string $id) {

        $user = User::where('id', auth()->id())->select([
            'id', 'firstname', 'email',
        ])->first();
            session()->put('login', 'hello');
        return view('chat', [
            'user' => $user,
        ]);

    }
    public function chats() {
        $id = auth()->id();
        $messages = Message::where('to_user', $id)
                  ->orWhere('user_id', $id)
                  ->get();
        $arr = [];
        foreach ($messages as $message) {
            if (!in_array($message['user_id'], $arr)){
                array_push($arr, $message["user_id"]);
            } else if (!in_array($message['to_user'], $arr)){
                array_push($arr, $message['to_user']);
            }
        }
        $key = array_search(auth()->id(), $arr);
        if (isset($key)){
            unset($arr[$key]);
        }
        return view('chats', ['dialogs'=>$arr]);
    }

    public function messages(string $id): JsonResponse {
        // $messages = Message::with('user')->get()->append('time');
        $authId = Auth::id();
        $messages = Message::with('user')->where(function ($query) use ($id, $authId) {
            // Условия первого варианта
            $query->where('user_id', $id)
                ->where('to_user', $authId);
        })
        ->orWhere(function ($query) use ($id, $authId) {
            // Условия второго варианта
            $query->where('user_id', $authId)
                ->where('to_user', $id);
        })
        ->orderBy('created_at') // порядок сортировки по дате отправки
        ->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request, string $id): JsonResponse {
        $message = Message::create([
            'user_id' => auth()->id(),
            'to_user' => $id,
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Fecades\Redirect;
use Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        // $user = User::where('id', auth()->id())->select([
        //     'id', 'firstname', 'email',
        // ])->first();
        // session(['userAuth'=>'true']);

        $user = User::where('id', auth()->id())->select([
            'id', 'firstname', 'email',
        ])->first();
            session()->put('login', 'hello');
        return view('chat', [
            'user' => $user,
        ]);

    }

    public function messages(): JsonResponse {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request): JsonResponse {
        // return response()->json(['text'=>session()->get('login')]);
        $message = Message::create([
            'user_id' => auth()->id(),
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }
}
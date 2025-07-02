<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAuthed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->id())
        {
            $user = User::where('id', auth()->id())->first();
            if ($user and $user->banned){
                session()->forget('userAuth');
                session()->forget('login');
                return redirect('/login');
            }
            return $next($request);
        }
        else{
            return redirect('/login');
        }
    }
}

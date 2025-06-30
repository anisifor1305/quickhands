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
        if (session('userAuth')=='true')
        {
            $user = User::where('login', session('login'))->first();
            if ($user->banned){
                session()->forget('userAuth');
                session()->forget('login');
                return redirect('/auth');
            }
            return $next($request);
        }
        else{
            return redirect('/auth');
        }
    }
}

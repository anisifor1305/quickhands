<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class isAdmin
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
            if ($user->banned){
                Session::flush();
                Auth::logout(); 
                return redirect('/banned');
            }
            if ($user->is_admin){
                return $next($request);
            }
            else{
                return redirect('/cpanel');
            }
        }
        else{
            return redirect('/login');
        }
    }   
}


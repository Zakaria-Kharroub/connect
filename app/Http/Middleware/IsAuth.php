<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
=======
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

>>>>>>> 4a30e442dd7ae31ac2957234614991e21da22eea

class IsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
<<<<<<< HEAD
        if(Auth::check())
        {
            return $next($request);
        }
        else
           return back();
    }



=======

        if(auth()->user()){
            return $next($request);
        }
        return redirect()->route('login');
    }
>>>>>>> 4a30e442dd7ae31ac2957234614991e21da22eea
}

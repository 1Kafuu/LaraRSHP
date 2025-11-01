<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class verifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {   
        if (Auth::check() && (in_array(session('user.role'), $role) || in_array('All',  $role))) {
            return $next($request);
        }
        else {
            Auth::logout();
            return redirect('/login')->with([
                'status' => 'danger',
                'message' => 'Tidak memiliki akses pada halaman tersebut'
            ]);
        }
    }
}

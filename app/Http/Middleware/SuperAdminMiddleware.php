<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role !== 'Super Admin') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
    // public function handle(Request $request, Closure $next, ...$users): Response
    // {
    //     if (!Auth::check()) {
    //         return redirect('/')->with('errormiddleware', 'You are not logged in!');
    //     }
    //     if(in_array(User::find(Auth::user()->role), $users)) {
    //         return back();
    //     }
    //     return $next($request);
    // }
}
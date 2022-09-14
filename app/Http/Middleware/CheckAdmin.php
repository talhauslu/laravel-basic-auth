<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 2) {
                return $next($request);
            } else {
                return redirect()->back()->withErrors('401 (UNAUTHORIZED)');
            }
        } else{
            return redirect()->route('loginform')->withErrors('You have to be logged in to view that page.');
        }

        // return $next($request);
    }
}

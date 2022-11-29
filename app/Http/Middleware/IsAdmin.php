<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // If the user logging in has the role 'Admin' then show admin console, else redirect to user dashboard.
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()) {
            if(auth()->user()->is_admin == 1) { // Login to admin dashboard if is_admin is 1.
                return $next($request);
            } elseif(auth()->user()->is_admin == 0) { // Login to client user dashboard if is_admin is 0.
                return redirect()->route('client_accounts.dashboard');
                // return redirect(route('login'));
            }
        } else { // When login session expires (due to inactivity) then redirect to login page instead of Laravel error page.
            return redirect(route('login'))->with('error','Login session expired.');
        }
    }
}

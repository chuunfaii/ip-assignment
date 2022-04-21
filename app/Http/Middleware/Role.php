<?php

// Author:  Lee Chun Fai

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $type)
    {
        $user = auth()->user();

        if ($user->type == $type) {
            return $next($request);
        }

        return redirect()->intended('/')->with('error', 'You do not have access to this page!');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginAdmMiddleware
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
    if ($request->session()->has('admin') && $request->session()->get('admin') === 'admin') {
        return $next($request);
    }

    if ($request->route()->getName() === 'loginAdm') {
        return $next($request);
    }

    return redirect()->route('loginAdm');
}

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

      if ($request->is('admin/login')) {
            return $next($request);
        }

        // Check if user is logged in via session
        if (!Session::has('userID')) {
            return redirect('/admin/login')->with('error', 'Please login first');
        }
        return $next($request);
    }
}

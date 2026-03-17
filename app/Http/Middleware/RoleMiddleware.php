<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if (!Session::has('userID')) {
            return redirect('/admin/login')->with('error', 'Please login first');
        }

        $userRole = Session::get('user_role');

        // Convert role parameter to array (supports "admin,super_admin" format)
        $allowedRoles = explode(',', $role);

        if (!in_array($userRole, $allowedRoles)) {
            return redirect('/admin')->with('error', 'You do not have permission to access this page');
        }
        return $next($request);
    }
}

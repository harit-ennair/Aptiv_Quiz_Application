<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }

        $user = Auth::user();
        
        // Check if user has admin or super admin role (assuming 1 = super admin, 2 = admin)
        if ($user->role_id != 1 && $user->role_id != 2) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'You must be logged in first');
        }

        $user = auth()->user();

        if ($user->role !== $role) {
            if ($user->role === 'user') {
                return redirect()->route('user.home')->with('error', 'You are not authorized to access the admin page.');
            }

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.home')->with('error', 'You are not authorized to access the user page.');
            }
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}

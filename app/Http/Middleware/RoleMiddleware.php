<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
<<<<<<< HEAD
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
=======
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return redirect('/unauthorized');
        }

        return $next($request);
>>>>>>> e7e5b0519c966654fddd06263bc881dc9ebe0be2
    }
}

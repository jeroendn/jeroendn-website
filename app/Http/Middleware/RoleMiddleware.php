<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Check if user has the given role(s)
     *
     * @param $request
     * @param Closure $next
     * @param $roles
     * @return RedirectResponse|mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode('|',$roles);
        foreach ($roles as $role) {
            if (Auth::user()->role->id === intval($role)) {
                return $next($request);
            }
        }

        return redirect()->route('login');
    }
}

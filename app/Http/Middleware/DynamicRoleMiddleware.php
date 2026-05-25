<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


use Symfony\Component\HttpFoundation\Response;

class DynamicRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user= Auth::user();
        // Retrieve all roles names dynamically from Spatie Role Model
        $allowed_roles= Role::pluck('name')->toArray();

        // Check if the user has any of the allowed roles
        if ($user && $user->hasAnyRole($allowed_roles)) {
            return $next($request);
        }
        // Redirect or abort if not authorized
        return abort(403, 'Unauthorized action.');
    }
}

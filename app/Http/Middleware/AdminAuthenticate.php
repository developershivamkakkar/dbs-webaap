<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    //  This method is responsible for determining where to redirect the user if they are not authenticated. If the request does not expect JSON ($request->expectsJson() returns false), it returns the route named 'admin.login'. This typically redirects users to the admin login page.

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('admin.login');
        }
    }

    /* This method handles the authentication process. It checks if the user is authenticated using the 'admin' guard. If the user is authenticated as an admin, it sets the current guard to 'admin' using $this->auth->shouldUse('admin'). If the user is not authenticated as an admin, it calls $this->unauthenticated($request, ['admin']), which triggers an unauthenticated response and typically redirects the user to the login page for admin authentication.*/
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            return $this->auth->shouldUse('admin');
        }

        $this->unauthenticated($request, ['admin']);
    }
}

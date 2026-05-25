<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Announcement;


class LoadAnnouncements
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Fetch announcements
        $announcements = Announcement::all(); // Adjust query as needed

        // Share data with all views
        view()->share('announcements', $announcements);
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SchoolEvent;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FrontendEventController extends Controller
{
    public function index()
    {
        $events = SchoolEvent::where('status', 'published')->orderBy('created_at', 'DESC')->paginate(12);
        return view('events-frontend.index', compact('events'));
    }

    public function event_detail(Request $request, $slug)
    {
        $event  = SchoolEvent::where('slug', $slug)->firstOrFail();
        $events = SchoolEvent::orderBy('created_at', 'DESC')->take(6)->get();

        app(SeoService::class)->fromEvent($event);

        return view('events-frontend.event-detail', compact('event', 'events'));
    }
}

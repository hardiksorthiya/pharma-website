<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->with('images')
            ->orderByDesc('event_date')
            ->get();

        return view('pages.frontend.events', compact('events'));
    }

    public function show(Event $event): View
    {
        $event->load('images');

        $previousEvent = Event::query()
            ->where('id', '!=', $event->id)
            ->where(function ($query) use ($event) {
                $query->where('event_date', '<', $event->event_date)
                    ->orWhere(function ($query) use ($event) {
                        $query->where('event_date', $event->event_date)
                            ->where('id', '<', $event->id);
                    });
            })
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->first();

        $nextEvent = Event::query()
            ->where('id', '!=', $event->id)
            ->where(function ($query) use ($event) {
                $query->where('event_date', '>', $event->event_date)
                    ->orWhere(function ($query) use ($event) {
                        $query->where('event_date', $event->event_date)
                            ->where('id', '>', $event->id);
                    });
            })
            ->orderBy('event_date')
            ->orderBy('id')
            ->first();

        return view('pages.frontend.event-show', compact('event', 'previousEvent', 'nextEvent'));
    }
}

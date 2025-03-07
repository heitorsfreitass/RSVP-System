<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class RSVPController extends Controller
{
    public function store(Event $event)
    {
        $event->users()->attach(auth()->id());
        return redirect()->back()->with('success', 'You have successfully RSVPed for this event.');
    }

    public function destroy(Event $event)
    {
        $event->users()->detach(auth()->id());
        return redirect()->back()->with('success', 'You have canceled your RSVP for this event.');
    }
}

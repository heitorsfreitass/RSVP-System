@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center" style="color: var(--accent);">Upcoming Events</h1>
        <div class="row">
            @forelse($events as $event)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg interactive" style="background-color: #2A2A2A; color: var(--text);">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 28px;"><b>{{ $event->title }}</b></h5>
                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                            <p class="card-text">
                                <strong>Starts:</strong> {{ $event->start_time->format('M d, Y H:i') }}<br>
                                <strong>Ends:</strong> {{ $event->end_time->format('M d, Y H:i') }}<br>
                                <strong>Location:</strong> {{ $event->location ?? 'Online' }}<br>
                                <strong>Creator:</strong> 
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('events.show', $event) }}" class="btn btn-accent">View Details</a>
                                @if($event->users->contains(auth()->id()))
                                    <form action="{{ route('events.rsvp.cancel', $event) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Cancel RSVP</button>
                                    </form>
                                @else
                                    <form action="{{ route('events.rsvp', $event) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">RSVP</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">No upcoming events found.</div>
                </div>
            @endforelse
        </div>
        <a href="{{ route('events.create') }}" class="btn btn-warning mb-4 interactive">Create New Event</a>
    </div>
@endsection
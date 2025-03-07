@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg mb-4" style="background-color: #2A2A2A; color: var(--text);">
            <div class="card-body">
                <h1 class="card-title">{{ $event->title }}</h1>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">
                    <strong>Starts:</strong> {{ $event->start_time->format('M d, Y H:i') }}<br>
                    <strong>Ends:</strong> {{ $event->end_time->format('M d, Y H:i') }}<br>
                    <strong>Location:</strong> {{ $event->location ?? 'Online' }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('events.index') }}" class="btn btn-accent">Back to Events</a>
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

        <div class="card shadow-lg" style="background-color: #2A2A2A; color: var(--text);">
            <div class="card-body">
                <h3 class="card-title">Attendees</h3>
                <ul class="list-group">
                    @forelse($event->users as $attendee)
                        <li class="list-group-item" style="background-color: #2A2A2A; color: var(--text);">{{ $attendee->name }}</li>
                    @empty
                        <li class="list-group-item" style="background-color: #2A2A2A; color: var(--text);">No attendees yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
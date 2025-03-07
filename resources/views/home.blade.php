@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="jumbotron py-5" style="color: var(--text);">
            <h1 class="display-5">Welcome to Event RSVP System 
                @auth    
                    <span style="color: var(--accent);">{{ auth()->user()->name }}</span>
                @endauth
            </h1>
            <p class="lead">Manage and RSVP to events with ease.</p>
            <hr class="my-4" style="border-color: var(--accent);">
            <p>Get started by exploring upcoming events or creating your own.</p>
            <div class="mt-4">
                @auth
                    <a href="{{ route('events.index') }}" class="btn btn-accent btn-lg me-2">Explore Events</a>
                    <a href="{{ route('events.create') }}" class="btn btn-warning btn-lg">Create Event</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-accent btn-lg me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg">Register</a>
                @endauth
            </div>
        </div>

        @auth
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg interactive" style="background-color: #2A2A2A; color: var(--text);">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="card-text">Browse and RSVP to upcoming events.</p>
                        <a href="{{ route('events.index') }}" class="btn btn-accent">View Events</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg interactive" style="background-color: #2A2A2A; color: var(--text);">
                    <div class="card-body">
                        <h5 class="card-title">Create Events</h5>
                        <p class="card-text">Organize and manage your own events.</p>
                        <a href="{{ route('events.create') }}" class="btn btn-warning">Create Event</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg interactive" style="background-color: #2A2A2A; color: var(--text);">
                    <div class="card-body">
                        <h5 class="card-title">Manage RSVPs</h5>
                        <p class="card-text">Track and manage your event RSVPs.</p>
                        <a href="{{ route('events.index') }}" class="btn btn-accent">View RSVPs</a>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
@endsection
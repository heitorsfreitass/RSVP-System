<footer class="footer" style="background-color: var(--primary); color: var(--text);">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Event RSVP System</h5>
                <p>Manage and RSVP to events with ease.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    @auth
                    <li><a href="{{ route('events.index') }}" style="color: var(--accent);">Events</a></li>
                    <li><a href="{{ route('events.create') }}" style="color: var(--accent);">Create Event</a></li>
                    @else
                    <li><a href="{{ route('login') }}" style="color: var(--accent);">Login</a></li>
                    <li><a href="{{ route('register') }}" style="color: var(--accent);">Register</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Follow Us</h5>
                <div class="social-icons">
                    <a href="#" target="_blank" style="color: var(--accent);"><i class="fab fa-facebook interactive"></i></a>
                    <a href="#" target="_blank" style="color: var(--accent);"><i class="fab fa-twitter interactive"></i></a>
                    <a href="#" target="_blank" style="color: var(--accent);"><i class="fab fa-instagram interactive"></i></a>
                    <a href="#" target="_blank" style="color: var(--accent);"><i class="fab fa-linkedin interactive"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; {{ date('Y') }} Event RSVP System. All rights reserved.</p>
        </div>
    </div>
</footer>
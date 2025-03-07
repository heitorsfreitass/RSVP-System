<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Event RSVP System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Pulsing Animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .auth-animate-pulse {
            animation: pulse 2s infinite;
        }

        /* Background and Global Styles */
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            font-family: 'Figtree', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Auth Card */
        .auth-card {
            background-color: #1A1A1A; /* Dark background for the form */
            border: 1px solid #444; /* Dark border */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        /* Form Control */
        .auth-form-control {
            background-color: #2A2A2A; /* Dark input background */
            color: #fff; /* White text */
            border: 1px solid #444; /* Dark border */
            border-radius: 5px;
            padding: 0.5rem;
            width: 100%;
        }

        .auth-form-control:focus {
            background-color: #2A2A2A;
            color: #fff;
            border-color: var(--accent); /* Accent color on focus */
            box-shadow: none;
        }

        /* Buttons */
        .auth-btn {
            background-color: var(--accent); /* Accent color for buttons */
            color: #000; /* Black text */
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .auth-btn:hover {
            background-color: #E6B800; /* Darker yellow on hover */
        }

        /* Text Colors */
        .auth-text-warning {
            color: var(--accent) !important; /* Accent color for links */
        }

        .auth-text-danger {
            color: #dc3545 !important; /* Red for error messages */
        }
    </style>
</head>
<body>
    <div class="d-flex" style="flex-direction: column;">

        <!-- Lock Icon -->
        <div class="auth-lock-container text-center mb-5 mt-4">
            <a href="/">
                <i class="fas fa-lock fa-5x text-white auth-animate-pulse"></i>
            </a>
        </div>
    
        <!-- Login Form -->
        <div class="auth-card">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="auth-form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @if ($errors->has('email'))
                        <div class="auth-text-danger mt-2">{{ $errors->first('email') }}</div>
                    @endif
                </div>
    
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="auth-form-control" type="password" name="password" required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <div class="auth-text-danger mt-2">{{ $errors->first('password') }}</div>
                    @endif
                </div>
    
                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>
    
                <!-- Forgot Password and Login Button -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="auth-text-warning text-decoration-none" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                    <button type="submit" class="auth-btn btn text-white">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
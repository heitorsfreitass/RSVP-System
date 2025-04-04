<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #8B0000; /* dark red */
            --secondary: #FF0000; /* red */
            --accent: #FFD700; /* yellow */
            --background: #1A1A1A; /* black */
            --text: #FFFFFF; /* white */
            --warning: #FFA500; /* orange */
        }

        body {
            background-color: var(--background);
            color: var(--text);
            font-family: 'Figtree', sans-serif;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: #6B0000; 
            border-color: #6B0000;
        }

        .btn-secondary {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }

        .btn-secondary:hover {
            background-color: #CC0000; 
            border-color: #CC0000;
        }

        .btn-accent {
            background-color: var(--accent);
            border-color: var(--accent);
            color: var(--background); 
        }

        .btn-accent:hover {
            background-color: #E6B800; 
            border-color: #E6B800;
        }

        .btn-warning {
            background-color: var(--warning);
            border-color: var(--warning);
            color: var(--background); 
        }

        .btn-warning:hover {
            background-color: #CC8400; 
            border-color: #CC8400;
        }

        .card {
            background-color: #2A2A2A; 
            color: var(--text);
            border: none;
        }

        .card-header {
            background-color: var(--primary);
            color: var(--text);
        }

        .footer {
            background-color: var(--primary);
            color: var(--text);
            padding: 40px 0;
            margin-top: auto; 
        }

        .footer a {
            color: var(--accent);
            text-decoration: none;
        }

        .footer a:hover {
            color: var(--warning);
        }

        .footer .social-icons a {
            font-size: 24px;
            margin: 0 10px;
        }

        .interactive {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }   

        .interactive:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="font-sans antialiased d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-primary shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="container py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.interactive').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
                card.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.2)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
                card.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
            });
        });
    </script>
</body>
</html>
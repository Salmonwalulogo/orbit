<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ request()->routeIs('register') ? 'Daftar' : 'Akun' }} | {{ config('app.name', 'SABU JAYA MART') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ asset('css/auth-motion.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased auth-motion-page">
        <main class="auth-register-shell">
            <section class="auth-register-showcase">
                <a href="{{ route('home') }}" class="auth-register-brand">
                    <span class="auth-register-brand-mark"><i class="bi bi-lightning-charge-fill"></i></span>
                    <span>{{ config('app.name', 'SABU JAYA MART') }}</span>
                </a>

                <div class="auth-register-copy">
                    <div class="eyebrow">{{ request()->routeIs('register') ? 'Belanja nyaman, transaksi terpercaya' : 'Akun SABU JAYA MART' }}</div>
                    @if (request()->routeIs('register'))
                        <h1>Mulai pengalaman belanja yang lebih mudah.</h1>
                        <p>Buat akun untuk menikmati kemudahan layanan {{ config('app.name', 'SABU JAYA MART') }}.</p>
                    @else
                        <h1>Akses akun Anda dengan mudah.</h1>
                        <p>Layanan {{ config('app.name', 'SABU JAYA MART') }} siap membantu kebutuhan Anda.</p>
                    @endif
                </div>

                @include('auth.partials.stack-cards')
            </section>

            <section class="auth-register-main" aria-label="Form akun">
                <div class="auth-register-form">
                    {{ $slot }}
                </div>
            </section>
        </main>
        <script src="{{ asset('js/auth-motion.js') }}" defer></script>
    </body>
</html>

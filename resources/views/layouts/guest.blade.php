<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        @media (prefers-color-scheme: dark) {
            .theme-image {
                content: url('../storage/logins/stokle-logoputih.png');
            }
        }

        @media (prefers-color-scheme: light) {
            .theme-image {
                content: url('../storage/logins/stokle-logohitam.png');
            }
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/3 flex items-center justify-center p-6 bg-gray-100 dark:bg-gray-800">
            <div class="w-full max-w-md">
                <a href="/">
                    <img class="theme-image w-48 mx-auto mb-8" src="{{ asset('.storage/logins/stokle-logohitam.png') }}"
                        alt="Theme Image">
                </a>
                {{ $slot }}
            </div>
        </div>
        <div class="hidden sm:flex w-2/3 relative items-center justify-center p-12"
            style="background-image: url('{{ asset('storage/logins/login-bg.jpg') }}'); background-size: cover; background-position: center;">
            <!-- [1] Lapisan Overlay untuk Efek Gelap dan Blur -->
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>

            <!-- [2] Gambar Ilustrasi di Atas Overlay -->
            <img src="{{ asset('storage/logins/topup-stockle.png') }}" alt="Ilustrasi" class="relative z-10 w-196">
        </div>
    </div>
</body>

</html>

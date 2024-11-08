<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZ6+F8Y7fGJ7skStXbVdP6RC7Kq7Xbr5Ply0mI" crossorigin="anonymous">
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="text-center mb-6">
            <a href="/"
                class="inline-flex items-center space-x-2 text-black dark:text-white hover:text-gray-700 dark:hover:text-gray-400">
                <span class="font-bold text-lg">EcoTour Uganda</span>
            </a>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Reconnect with nature, experience authentic Uganda.</p>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">
        &copy; {{ date('Y') }} EcoTour Uganda. All rights reserved.
    </p>

    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2024/10/28/04/20241028044539-89UMPRMF.js"></script>
</body>

</html>
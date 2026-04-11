<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VidyaSetu - @yield('title', 'School Management System')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
     <!-- Bootstrap 5 CSS + Icons + Font Awesome (required for icons) -->
    <link rel="stylesheet" href="{{ asset('css/code.css') }}">
</head>

<body class="bg-gray-50">
    <x-header />

    <main>
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
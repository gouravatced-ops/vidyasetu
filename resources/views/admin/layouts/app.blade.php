<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - VidyaSetu')</title>

    <!-- Tailwind CSS CDN -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- css file  -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Alpine.js for reactive components -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>

    <!-- ═══ PAGE LOADER ═══ -->
    <div id="pageLoader">
        <div class="loader-logo">
            <svg viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
        </div>
        <div class="loader-bar">
            <div class="loader-fill"></div>
        </div>
        <div class="loader-text">Loading Vidyasetu...</div>
    </div>

    <!-- ═══ TOAST CONTAINER ═══ -->
    <div class="toast-wrap" id="toastWrap"></div>

    <div class="layout">
        <!-- Sidebar -->
        <x-admin-sidebar />

        <!-- Mobile overlay -->
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeMobileSidebar()"></div>

        <!-- Main content -->
        <div class="main-wrap" id="mainWrap">

            <!-- Header -->
            <x-admin-header />

            <!-- Page content -->
            <div class="content">
                @yield('content')
            </div>

            <!-- Footer -->
            <x-admin-footer />
        </div>
    </div>

    @stack('scripts')
    <script>
        window.userName = @json(auth()->user()->name);
        window.userRole = @json(auth()->user()->role->name ?? null);
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/assets/main.js') }}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Parent Portal - VidyaSetu')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0EVHe/X+R7YkZBv3Y9F8rPqbaU9WWhR0bbhGx8fFQ5eSGzV3wC9XrFJQ5P4Vnp1k" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f0ff;
        }

        .sidebar {
            width: 16rem;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            overflow-y: auto;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-closed {
            transform: translateX(-100%);
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .main-content {
            margin-left: 0;
            transition: margin 0.3s ease-in-out;
        }

        @media (min-width: 992px) {
            .sidebar {
                transform: none;
            }

            .sidebar-overlay {
                display: none !important;
            }

            .main-content {
                margin-left: 16rem;
            }
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f3f4f6;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Sidebar -->
    <x-parent-sidebar />

    <!-- Mobile overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <!-- Main content -->
    <div class="main-content min-vh-100">
        <!-- Header -->
        <x-parent-header />

        <!-- Page content -->
        <main class="container-fluid py-4 custom-scrollbar">
            @yield('content')
        </main>

        <!-- Footer -->
        <x-parent-footer />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1F2Fzv3t27N1zFoX77K0v5QmP1O1nlgapF+eA7yrE+0" crossorigin="anonymous" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('parentSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebarToggle && sidebar && overlay) {
                sidebarToggle.addEventListener('click', function () {
                    sidebar.classList.toggle('sidebar-closed');
                    overlay.style.display = sidebar.classList.contains('sidebar-closed') ? 'none' : 'block';
                });

                overlay.addEventListener('click', function () {
                    sidebar.classList.add('sidebar-closed');
                    overlay.style.display = 'none';
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
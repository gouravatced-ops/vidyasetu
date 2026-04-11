@props([
    'title' => 'Page Title',
    'paragraph' => null,
    'breadcrumbTitle' => null,
])

@php
    $breadcrumbTitle = $breadcrumbTitle ?? $title;
@endphp
<section class="vs-hero-modern vs-py-4">
    <!-- floating svg vector icons + modern geometric shapes -->
    <div class="vs-hero-floating-svgs">
        <!-- Font Awesome based floating icons (vector style) -->
        <div class="vs-float-icon vs-float-icon-1"><i class="fas fa-graduation-cap"></i></div>
        <div class="vs-float-icon vs-float-icon-2"><i class="fas fa-chalkboard-user"></i></div>
        <div class="vs-float-icon vs-float-icon-3"><i class="fas fa-laptop-code"></i></div>
        <div class="vs-float-icon vs-float-icon-4"><i class="fas fa-cloud-upload-alt"></i></div>
        <div class="vs-float-icon vs-float-icon-5"><i class="fas fa-brain"></i></div>
        <div class="vs-float-icon vs-float-icon-6"><i class="fas fa-robot"></i></div>
        <div class="vs-float-icon vs-float-icon-7"><i class="fas fa-chart-line"></i></div>
        <div class="vs-float-icon vs-float-icon-8"><i class="fas fa-globe-americas"></i></div>

        <!-- additional SVG vector shapes as floating abstract design (pure svg inline) -->
        <svg class="vs-float-svg-shape vs-pulse-soft" width="140" height="140" viewBox="0 0 140 140" style="top: 8%; right: 12%; width: 90px; height: 90px;">
            <path d="M70,10 L85,40 L120,45 L95,70 L100,105 L70,90 L40,105 L45,70 L20,45 L55,40 Z" fill="#8b5cf6" opacity="0.6" />
        </svg>
        <svg class="vs-float-svg-shape" width="200" height="200" viewBox="0 0 200 200" style="bottom: 5%; left: 3%; width: 110px; height: 110px; animation: floatAround 25s infinite ease-in-out;">
            <circle cx="100" cy="100" r="45" fill="none" stroke="#4f46e5" stroke-width="3" opacity="0.5" stroke-dasharray="8 6" />
            <circle cx="100" cy="100" r="65" fill="none" stroke="#10b981" stroke-width="2" opacity="0.3" stroke-dasharray="5 8" />
        </svg>
        <svg class="vs-float-svg-shape" width="160" height="160" viewBox="0 0 160 160" style="top: 65%; right: 5%; width: 70px; height: 70px; animation: floatAround 19s infinite alternate;">
            <polygon points="80,15 100,40 95,70 65,70 60,40" fill="#f59e0b" opacity="0.35" />
            <polygon points="80,30 92,48 88,65 72,65 68,48" fill="#fbbf24" opacity="0.4" />
        </svg>
        <svg class="vs-float-svg-shape" width="120" height="120" viewBox="0 0 120 120" style="left: 25%; bottom: 20%; width: 60px; height: 60px; animation: floatAround 21s infinite ease-in-out;">
            <rect x="30" y="30" width="60" height="60" rx="14" fill="#ec489a" opacity="0.3" transform="rotate(15, 60, 60)" />
            <rect x="42" y="42" width="36" height="36" rx="8" fill="#f472b6" opacity="0.2" transform="rotate(8, 60, 60)" />
        </svg>
    </div>

    <!-- subtle glow background -->
    <div class="vs-hero-glow"></div>

    <div class="vs-container vs-px-4 vs-hero-content">
        <!-- Breadcrumb: Home / About Us -->
        <nav aria-label="breadcrumb" class="vs-breadcrumb">
            <a href="/" class="vs-breadcrumb-item">
                <i class="fas fa-home"></i> Home
            </a>
            <span class="vs-breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
            <span class="vs-breadcrumb-item active" aria-current="page">
                <i class="fas fa-info-circle"></i> {{ $breadcrumbTitle }}
            </span>
        </nav>
        <div class="vs-text-center vs-mx-auto-max-800">
            <h1 class="vs-display-3 vs-fw-bold vs-text-dark vs-mb-4">
                {{ $title }}
            </h1>
            <p class="vs-fs-4 vs-text-secondary vs-lh-base">
                {{ $paragraph }}
            </p>
        </div>
    </div>
</section>
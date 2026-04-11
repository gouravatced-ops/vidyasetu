@props(['title' => 'Page Title', 'subtitle' => null])

<section class="relative py-20 bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200/30 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-purple-200/30 rounded-full blur-xl"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-indigo-200/30 rounded-full blur-xl"></div>
    </div>

    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6 leading-tight">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ $subtitle }}
            </p>
        @endif
        <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto mt-8 rounded-full"></div>
    </div>
</section>
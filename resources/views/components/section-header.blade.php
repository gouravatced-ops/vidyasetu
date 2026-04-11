@props([
    'tag' => 'Tag',
    'title' => 'Page Title',
    'subtitle' => null,
])

<div class="section-header">
    <div class="section-tag">{{ $tag }}</div>
    <h2 class="section-title">{{ $title }}</h2>

    @if($subtitle)
        <p class="section-sub">{{ $subtitle }}</p>
    @endif
</div>
@props([
    'title' => '',
    'breadcrumbs' => [],
    'search' => null,
    'searchPlaceholder' => 'Search...',
    'column' => null,
    'columns' => [],
    'createUrl' => null,
    'createText' => 'Add New',
    'resetUrl' => null,
])

<div class="panel">
    <div class="panel-header">
        <div>
            <div class="panel-title">{{ $title }}</div>
            @if(!empty($breadcrumbs))
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    @foreach($breadcrumbs as $breadcrumb)
                        @if(isset($breadcrumb['url']))
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                        @else
                            <span>{{ $breadcrumb['label'] }}</span>
                        @endif
                        @if(! $loop->last)
                            <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        @if($createUrl)
            <div class="panel-actions">
                <a href="{{ $createUrl }}" class="btn-add"><i class="fas fa-plus"></i> {{ $createText }}</a>
            </div>
        @endif
    </div>

    <div class="panel-body">
        <div class="tbl-toolbar">
            <form action="{{ request()->url() }}" method="GET" class="d-flex flex-wrap gap-2 align-items-center" style="width:100%;">
                <div class="tbl-search">
                    <i class="fas fa-search"></i>
                    <input type="search" name="search" value="{{ $search }}" placeholder="{{ $searchPlaceholder }}" autocomplete="off">
                </div>

                @if(count($columns))
                    <div class="tbl-search">
                        <select name="column" class="form-select form-select-sm" style="border:none; background:transparent; min-width:180px;">
                            <option value="" {{ $column ? '' : 'selected' }}>All columns</option>
                            @foreach($columns as $key => $label)
                                <option value="{{ $key }}" {{ $column === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <button type="submit" class="btn-search"><i class="fas fa-search"></i> Search</button>
                <a href="{{ $resetUrl ?? request()->url() }}" class="btn btn-outline-secondary" style="border-radius:6px; padding:8px 16px; font-size:.82rem;">Reset</a>
            </form>
        </div>

        {{ $slot }}
    </div>
</div>

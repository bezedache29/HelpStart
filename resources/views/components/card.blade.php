@props(['title'])

<div class="card">
    @isset($title)
        <div class="card-header">
            {{ $title }}
        </div>
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
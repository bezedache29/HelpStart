@props(['route', 'label'])

<a class="btn btn-link" href="{{ route($route) }}">
    {{ __($label) }}
</a>
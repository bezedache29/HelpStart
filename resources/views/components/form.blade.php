@props(['route', 'routeId' => null, 'method' => 'post', 'files' => false, 'wire' => false])

<form @if(!$wire)action="{{ route($route, $routeId) }}" method="{{ $method }}" @else wire:submit.prevent="{{ $wire }}" @endif @if($files) enctype='multipart/form-data' @endif>
    @csrf

   {{ $slot }}

</form>
@props(['route', 'routeId' => null, 'method' => 'post', 'files' => false])

<form action="{{ route($route, $routeId) }}" method="{{ $method }}" @if($files) enctype='multipart/form-data' @endif>
    @csrf

   {{ $slot }}

</form>
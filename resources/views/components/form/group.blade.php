@props(['field', 'label'])

<div class="mb-3">
    <x-form.label label="{{ $label }}" field="{{ $field }}" />

    {{ $slot }}
    
    <p class="text-danger">{{ $errors->first($field) }}</p>
</div>
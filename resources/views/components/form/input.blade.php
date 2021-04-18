@props(['label', 'field', 'value' => null, 'type' => 'text', 'wire' => false])

<div class="mb-3">
    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control" id="{{ $field }}" name="{{ $field }}" @if ($wire) wire:model.debounce.500ms="{{ $wire }}" @else value="{{ old($field) ?? $value }}" @endif>
    {{-- @error($errors->first($field))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror --}}
    <p class="text-danger">{{ $errors->first($field) }}</p>
</div>
@props(['label', 'field', 'value' => null, 'type' => 'text'])

<div class="mb-3">
    <label for="{{ $field }}" class="form-label">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ old($field) ?? $value }}">
    {{-- @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror --}}
    <p class="text-danger">{{ $errors->first($field) }}</p>
</div>
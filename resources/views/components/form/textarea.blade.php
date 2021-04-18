@props(['label', 'field', 'value' => null, 'rows' => null, 'wire' => false])

<x-form.group :label="$label" :field="$field">
    <textarea @if ($wire) wire:model.debounce.500ms="{{ $wire }}" @endif class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" rows="{{ $rows }}" name="{{ $field }}">{{ old($field) ?? $value }}</textarea>
</x-form.group>
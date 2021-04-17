@props(['label', 'field', 'value' => null, 'rows' => null])

<x-form.group :label="$label" :field="$field">
    <textarea class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" rows="{{ $rows }}" name="{{ $field }}">{{ old($field) ?? $value }}</textarea>
</x-form.group>
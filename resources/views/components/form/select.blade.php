@props(['label', 'field', 'value' => null, 'values'])

<x-form.group field="{{ $field }}" label="{{ $label }}">
    <select name="{{ $field }}" id="{{ $field }}" class="form-control">
        @foreach ($values as $k => $v)
            <option value="{{ $k }}" @if ($k == (old($field) ?? $value)) selected @endif >{{ $v }}</option>
        @endforeach
    </select>
</x-form.group>
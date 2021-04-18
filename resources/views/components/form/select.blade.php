@props(['label', 'field', 'value' => null, 'values', 'wire' => false])

<x-form.group field="{{ $field }}" label="{{ $label }}">
    <select @if ($wire) wire:model="{{ $wire }}" @endif name="{{ $field }}" id="{{ $field }}" class="form-control">
        @foreach ($values as $k => $v)
            <option value="{{ $k }}" @if ($k == (old($field) ?? $value)) selected @endif >{{ $v }}</option>
        @endforeach
    </select>
</x-form.group>
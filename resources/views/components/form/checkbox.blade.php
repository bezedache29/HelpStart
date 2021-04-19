{{-- @props(['label', 'field', 'value', 'checked', 'id' => $field])

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $id }}" name="{{ $field }}" @if($checked) checked @endif>
    <label class="form-check-label" for="{{ $field }}">
        {{ $label }}
    </label>
</div> --}}

@props(['label', 'field', 'value', 'checked', 'id' => $field, 'wire' => false])


<div class="form-check">
    <input @if($wire) wire:model="{{ $wire }}" @endif class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $id }}" name="{{ $field }}" @if($checked) checked @endif>
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>



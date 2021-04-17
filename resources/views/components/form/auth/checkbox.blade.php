@props(['field', 'label'])


<div class="form-check">
    <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" {{ old($field) ? 'checked' : '' }}>

    <label class="form-check-label" for="{{ $field }}">
        {{ __($label) }}
    </label>
</div>
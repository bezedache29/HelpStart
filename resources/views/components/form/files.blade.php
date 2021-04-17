@props(['field', 'label'])

<div class="custom-file mb-3">
    <input type="file" name="{{ $field }}[]" class="custom-file-input" id="customFile" multiple>
    <label class="custom-file-label" for="customFile">{{ $label }}</label>
</div>
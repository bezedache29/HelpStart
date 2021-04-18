@props(['field', 'label', 'wire' => false])

<div class="custom-file mb-3">
    <input type="file" name="{{ $field }}[]" class="custom-file-input" id="customFile" multiple @if ($wire) wire:model="{{ $wire }}" @endif >
    <label class="custom-file-label" for="customFile">{{ $label }}</label>
</div>
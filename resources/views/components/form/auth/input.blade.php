@props(['field', 'type' => 'text', 'auto'])

<div class="col-md-6">
    <input id="{{ $field }}" type="{{ $type }}" class="form-control @error( $field ) is-invalid @enderror" name="{{ $field }}" value="{{ old( $field ) }}" required autocomplete="{{ $auto }}" autofocus>

    @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
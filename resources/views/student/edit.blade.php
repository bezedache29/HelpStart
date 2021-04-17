@extends('layouts.app')

@section('content')
<div class="container">
    <x-card>
        <h1 class="text-center">Mon profile</h1>
        <x-form route="profile.update">

            {{-- <div class="mb-3">
                <label for="promotion" class="form-label">Promotion</label>
                <select name="promotion_id" id="promotion" class="form-control">
                    @foreach ($promotions as $promotion)
                        <option value="{{ $promotion->id }}" @if ($promotion->id == (old('promotion_id') ?? $profile->promotion_id)) selected @endif >{{ $promotion->section->name }} - {{ $promotion->name }}</option>
                    @endforeach
                </select>
                @error('promotion_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}
            <x-form.select field='promotion_id' label="Promotions" :value="$profile->promotion_id" :values="$promotions->pluck('full_name', 'id')" />


            {{-- <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $profile->phone }}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}

            <x-form.input field="phone" type="number" label="Téléhone" :value="$profile->phone" />

            <x-form.input field="discord" type="text" label="Discord" :value="$profile->discord" />

            <x-form.input field="messenger" type="text" label="Messenger" :value="$profile->messenger" />

            <x-form.input field="instagram" type="text" label="Instagram" :value="$profile->instagram" />

            <x-form.input field="twitter" type="text" label="Twitter" :value="$profile->twitter" />

            <x-form.input field="linkedin" type="text" label="Linkedin" :value="$profile->linkedin" />

            <x-form.submit />

            {{-- <button type="submit" class="btn btn-primary mt-3">Enregistrer</button> --}}
        </x-form>
    </x-card>
</div>
@endsection
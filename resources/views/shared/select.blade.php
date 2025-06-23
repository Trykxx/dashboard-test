@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $options ??= [];
@endphp

<div @class(['mb-3', $class])>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        <option value="">Sélectionnez...</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" @selected(old($name, $value) == $key)>{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row mb-3">
    <label for="{{ $name }}" class="col-sm-2 col-form-label" >{{ $labelName }}</label>
    <div class="col-sm-10">
        <select class="form-control form-control-sm {{ $inputClass ?? '' }}" name="{{ $name }}" id="{{ $name }}">
            {{ $slot }}
        </select>

        @if (!empty($name))
            @error($name)
            <div class="invalid-feedback d-block"> {{ $message }} </div>
            @enderror
        @endif
    </div>

</div>


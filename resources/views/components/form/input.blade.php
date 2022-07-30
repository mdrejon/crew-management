<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="basic-default-name">{{ $labelName }}</label>
    <div class="col-sm-10">
        <input type="{{ $type ?? 'text' }}" name="{{  $name }}" value="{{ $value ?? '' }}" {{ $disabled ?? '' }} class="form-control {{ $class ?? '' }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" />
        @error(''.$name.'') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror
    </div>

</div>

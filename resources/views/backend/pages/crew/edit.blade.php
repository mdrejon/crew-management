@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="POST" action="{{ route('admin.crew.update',[$crew->id]) }}" enctype="multipart/form-data" >
            @method('PUT')
          @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <x-form.input labelName="ID No" value="{{ $crew->id_no }}"  name="id_no" placeholder="ID No" />
                    <x-form.input labelName="Last Name" value="{{ $crew->last_name }}" name="last_name" placeholder="Last Name" />
                    <x-form.input labelName="Given Name" value="{{ $crew->given_name }}" name="given_name" placeholder="Enter Given Name" />
                    <x-form.input  labelName="Full Name" value="{{ $crew->full_name }}" name="full_name" placeholder="Enter Full Name" />
                    <x-form.input  labelName="Sign In" value="{{ $crew->sign_in }}" name="sign_in" placeholder="Sign In" />
                    <x-form.input  labelName="Sign Out" value="{{ $crew->sign_out }}" name="sign_out" placeholder="Sign Out" />
                        <x-form.select name="vessel_id" labelName="Vessel">
                            <option value="">Select Please</option>
                            @foreach ($vessels as $data )
                                <option <?php if($crew->vessel_id == $data->id){echo "selected"; } ?> value="{{ $data->id }}">{{ $data->vessel_name }}</option>
                            @endforeach
                        </x-form.select>
                    <x-form.input  type="file" labelName="Image" name="img" placeholder="Enter country Image" />
                        <input type="hidden" name="old_img" value="{{ $crew->img }}">
                    <x-form.input labelName="Place Of Birth" value="{{ $crew->place_of_birth }}" name="place_of_birth" placeholder="Place Of Birth" />
                    <x-form.input labelName="Date Of Birth" value="{{ $crew->date_of_birth }}" name="date_of_birth" placeholder="Date Of Birth" />
                    <x-form.input labelName="Height" value="{{ $crew->height }}" name="height" placeholder="Enter Height" />
                    <x-form.input labelName="Weight" value="{{ $crew->weight }}" name="weight" placeholder="Enter Weight" />
                    <x-form.input labelName="Boiler Suit" value="{{ $crew->boiler_suit }}" name="boiler_suit" placeholder="Boiler Suit" />
                    <x-form.input labelName="Safety Shoes" value="{{ $crew->safety_shoes }}" name="safety_shoes" placeholder="Enter Safety Shoes" />
                    <x-form.input labelName="Marital Status" value="{{ $crew->marital_status }}" name="marital_status" placeholder="Enter Marital Status" />
                    <x-form.input labelName="Mobile No" value="{{ $crew->mobile_no }}" name="mobile_no" placeholder="Enter Mobile No" />
                    <x-form.input labelName="Nationality" value="{{ $crew->nationality }}" name="nationality" placeholder="Enter Nationality" />
                    <x-form.input labelName="Hair Color" value="{{ $crew->hair_color }}" name="hair_color" placeholder="Enter Hair Color" />
                    <x-form.input labelName="Eyes Color" value="{{ $crew->eyes_color }}" name="eyes_color" placeholder="Enter Eyes Color" />
                    <x-form.input labelName="SID No" value="{{ $crew->sid_no }}" name="sid_no" placeholder="Enter SID No " />
                    <x-form.input labelName="NID No" value="{{ $crew->nid_no }}" name="nid_no" placeholder="Enter NID No" />
                    <x-form.input labelName="Religion" value="{{ $crew->religion }}" name="religion" placeholder="Enter Religion" />
                    <x-form.input labelName="Covid Vaccination" value="{{ $crew->covid_vaccination }}" name="covid_vaccination" placeholder="Enter Covid Vaccination" />
                    <x-form.input labelName="Address" value="{{ $crew->address }}" name="address" placeholder="Enter Address" />
                    <x-form.input labelName="Email" value="{{ $crew->email }}" name="email" placeholder="Enter Email" />
                    <x-form.input labelName="Next Of Kin" value="{{ $crew->next_of_kin }}" name="next_of_kin" placeholder="Enter Next Of Kin" />
                    <x-form.input labelName="Relationship" value="{{ $crew->relationship }}" name="relationship" placeholder="Enter Relationship" />
                    <x-form.input labelName="Family Phone Number" value="{{ $crew->family_phone_no }}" name="family_phone_no" placeholder="Enter Family Phone Number" />
                    <x-form.input labelName="Address Next Of Kin" value="{{ $crew->address_next_of_kin }}" name="address_next_of_kin" placeholder="Enter Address Next Of Kin" />
                    <x-form.input labelName="Status" name="status" value="{{ $crew->status }}" placeholder="Status" />
                    <x-form.input type="number" value="{{ $crew->order }}" labelName="Order" name="order" placeholder="Order Number" />


                    <div class="row justify-content-end">
                        <div class="col-sm-10 mt-3 text-right">
                        <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function(){

    });
  </script>
@endpush
@endsection


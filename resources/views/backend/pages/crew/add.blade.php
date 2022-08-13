@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="POST" action="{{ route('admin.crew.store') }}" enctype="multipart/form-data" >
          @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <x-form.input labelName="ID No" name="id_no" placeholder="ID No" />
                    <x-form.input labelName="Last Name" name="last_name" placeholder="Last Name" />
                    <x-form.input labelName="Given Name" name="given_name" placeholder="Enter Given Name" />
                    <x-form.input  labelName="Full Name" name="full_name" placeholder="Enter Full Name" />
                    <x-form.input  labelName="Sign In" name="sign_in" placeholder="Sign In" />
                    <x-form.input  labelName="Sign Out" name="sign_out" placeholder="Sign Out" />
                    <x-form.select name="vessel_id" labelName="Vessel">
                        <option value="">Select Please</option>
                        @foreach ($vessels as $data )
                            <option value="{{ $data->id }}">{{ $data->vessel_name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input  type="file" labelName="Image" name="img" placeholder="Enter country Image" />
                    <x-form.input labelName="Place Of Birth" name="place_of_birth" placeholder="Place Of Birth" />
                    <x-form.input labelName="Date Of Birth" name="date_of_birth" placeholder="Date Of Birth" />
                    <x-form.input labelName="Height" name="height" placeholder="Enter Height" />
                    <x-form.input labelName="Weight" name="weight" placeholder="Enter Weight" />
                    <x-form.input labelName="Boiler Suit" name="boiler_suit" placeholder="Boiler Suit" />
                    <x-form.input labelName="Safety Shoes" name="safety_shoes" placeholder="Enter Safety Shoes" />
                    <x-form.input labelName="Marital Status" name="marital_status" placeholder="Enter Marital Status" />
                    <x-form.input labelName="Mobile No" name="mobile_no" placeholder="Enter Mobile No" />
                    <x-form.input labelName="Nationality" name="nationality" placeholder="Enter Nationality" />
                    <x-form.input labelName="Hair Color" name="hair_color" placeholder="Enter Hair Color" />
                    <x-form.input labelName="Eyes Color" name="eyes_color" placeholder="Enter Eyes Color" />
                    <x-form.input labelName="SID No" name="sid_no" placeholder="Enter SID No " />
                    <x-form.input labelName="NID No" name="nid_no" placeholder="Enter NID No" />
                    <x-form.input labelName="Religion" name="religion" placeholder="Enter Religion" />
                    <x-form.input labelName="Covid Vaccination" name="covid_vaccination" placeholder="Enter Covid Vaccination" />
                    <x-form.input labelName="Address" name="address" placeholder="Enter Address" />
                    <x-form.input labelName="Email" name="email" placeholder="Enter Email" />
                    <x-form.input labelName="Next Of Kin" name="next_of_kin" placeholder="Enter Next Of Kin" />
                    <x-form.input labelName="Relationship" name="relationship" placeholder="Enter Relationship" />
                    <x-form.input labelName="Family Phone Number" name="family_phone_no" placeholder="Enter Family Phone Number" />
                    <x-form.input labelName="Address Next Of Kin" name="address_next_of_kin" placeholder="Enter Address Next Of Kin" />
                    <x-form.input labelName="Status" name="status" placeholder="Status" />
                    <x-form.input type="number" labelName="Order" name="order" placeholder="Order Number" />


                    <div class="row justify-content-end">
                        <div class="col-sm-10 mt-3 text-right">
                        <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
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


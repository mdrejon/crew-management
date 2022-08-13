@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="POST" action="{{ route('admin.certificate.store') }}" enctype="multipart/form-data" >
          @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                </div>
                <div class="card-body">
                    <x-form.select name="certificate_type" labelName="Status">
                        <option value="">Select Please</option>
                        <option value="general">General</option>
                        <option value="professional">Professional</option>
                        <option value="medical">Medical</option>
                    </x-form.select>
                    <x-form.input labelName="Certificate Title" name="certificate_title" placeholder="Certificate Title" />
                    <x-form.select name="status" labelName="Status">
                        <option value="">Select Please</option>
                        <option value="1">Active</option>
                        <option value="0">In active</option>
                    </x-form.select>
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


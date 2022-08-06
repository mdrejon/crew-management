@extends('layouts.backend')
@section('contents')
<?php
use Illuminate\Support\Facades\DB;
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="POST" action="{{ route('admin.general-cv.update',[$general_cv->id]) }}"  enctype="multipart/form-data" >
            @method('PUT')

            @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <x-form.select name="crew_id" labelName="Crew">
                        <option value="">Select Please</option>
                        @foreach ($crew as $data )
                            <option <?php if($general_cv->crew_id == $data->id){echo "selected"; } ?> value="{{ $data->id }}">{{ $data->full_name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input value="{{ $general_cv->position_applied }}" labelName="Position Applied" name="position_applied" placeholder="Position Applied" />
                    <x-form.input value="{{ $general_cv->application_date }}" labelName="Application Date" name="application_date" placeholder="Application Date" />
                    <x-form.select name="for_vessel" labelName="Vessel">
                        <option value="">Select Please</option>
                        @foreach ($vessels as $data )
                            <option <?php if($general_cv->for_vessel == $data->id){echo "selected"; } ?> value="{{ $data->id }}">{{ $data->vessel_name }}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input type="date" value="{{ $general_cv->available_date }}" labelName="Available Date" name="available_date" placeholder="Available Date" />
                    <x-form.input value="{{ $general_cv->manning_agent }}" labelName="Manning Agent" name="manning_agent" placeholder="Manning Agent" />
                    <x-form.input type="file" value="{{ $general_cv->signature_of_applicant }}" labelName="Signature Of Applicant" name="signature_of_applicant" placeholder="Signature Of Applicant" />
                    <x-form.input type="date" value="{{ $general_cv->signature_date }}" labelName="Signature Date" name="signature_date" placeholder="Signature Date" />
                    <x-form.input value="{{ $general_cv->interview_by }}" labelName="Interview By"  name="interview_by" placeholder="Interview By" />
                    <x-form.input type="date" value="{{ $general_cv->interview_date }}" labelName="Interview Date" name="interview_date" placeholder="Interview Date" />
                    <x-form.input value="{{ $general_cv->department }}" labelName="Department" name="department" placeholder="Department" />
                    <x-form.select name="status" labelName="Status">
                        <option  value="">Select Please</option>
                        <option <?php if($general_cv->status == 0){echo "selected"; } ?> value="0">In active</option>
                        <option <?php if($general_cv->status == 1){echo "selected"; } ?>  value="1">Active</option>
                    </x-form.select>
                    <x-form.input type="number" value="{{ $general_cv->order }}" labelName="Order" name="order" placeholder="Enter Ship order Number" />

                    <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_academic_qualificaition" aria-expanded="true"  aria-controls="crew_academic_qualificaition" > Crew Academic Qualificaition </button>
                          </h2>
                          <div id="crew_academic_qualificaition" class="accordion-collapse collapse show" data-bs-parent="#crew_academic_qualificaitiontExample">
                            <div class="accordion-body" id="add_new_crew_academic_qualificaition_block">
                              <div class="accordion mt-3" id="crew_academic_qualificaitionExample">
                                <?php $academic_qualificaitions = DB::table('crew_academic_qualificaitions')->where('crew_id', $general_cv->crew_id)->get();
                                    $academic_qualificaitions_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($academic_qualificaitions as $data )
                                <div class="card accordion-item" data-id="{{ $academic_qualificaitions_inc }}">
                                  <h2 class="accordion-header" id="heading{{ $academic_qualificaitions_inc }}">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_academic_qualificaition_{{ $academic_qualificaitions_inc }}" aria-expanded="true"  aria-controls="crew_academic_qualificaition" >Data</button>
                                  </h2>
                                  <div id="crew_academic_qualificaition_{{ $academic_qualificaitions_inc }}" class="accordion-collapse collapse " data-bs-parent="#crew_academic_qualificaitionExample"  >
                                    <div class="accordion-body">
                                        <input type="hidden" name="update_academic_qualificaition[]" value="{{ $data->id }}">
                                      <x-form.input value="{{ $data->from }}" labelName="From" name="from[]" placeholder="From" />
                                      <x-form.input value="{{ $data->to }}" labelName="To" name="to[]" placeholder="To" />
                                      <x-form.input value="{{ $data->institutions }}" labelName="Institutions" name="institutions[]" placeholder="Institutions" />
                                      <x-form.input value="{{ $data->qualifications }}" labelName="Qualifications" name="qualifications[]" placeholder="Qualifications" />
                                    </div>
                                  </div>
                                </div>
                                <?php $academic_qualificaitions_inc++ ?>
                                @endforeach
                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_crew_academic_qualificaition" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_immigration_documents" aria-expanded="true"  aria-controls="crew_immigration_documents" > Crew Immigration Documents </button>
                          </h2>
                          <div id="crew_immigration_documents" class="accordion-collapse collapse" data-bs-parent="#crew_immigration_documentsExample"  >
                            <div class="accordion-body" id="crew_immigration_documents_block">
                              <div class="accordion mt-3" id="crew_immigration_documentsExample">
                                <?php $immigration_documents = DB::table('crew_immigration_documents')->where('crew_id', $general_cv->crew_id)->get();
                                    $immigration_documents_inc = 1;
                                    // dd($managements);
                                ?>
                                 @foreach ($immigration_documents as $data )
                                <div class="card accordion-item" data-id="{{ $immigration_documents_inc }}">
                                  <h2 class="accordion-header" id="heading{{ $immigration_documents_inc }}">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_immigration_documents_{{ $immigration_documents_inc }}" aria-expanded="true"  aria-controls="crew_immigration_documents" >Data</button>
                                  </h2>
                                  <div id="crew_immigration_documents_{{ $immigration_documents_inc }}" class="accordion-collapse collapse show" data-bs-parent="#crew_immigration_documentsExample"  >
                                    <div class="accordion-body">
                                        <input type="hidden" name="update_immigration_documents[]" value="{{ $data->id }}">
                                      <x-form.input value="{{ $data->document_title }}" labelName="Document Title" name="document_title[]" placeholder="Document Title" />
                                      <x-form.input value="{{ $data->issue_at }}" labelName="Issue at" name="issue_at[]" placeholder="Issue at" />
                                      <x-form.input value="{{ $data->issue_date }}" labelName="Issue Date" name="issue_date[]" placeholder="Issue Date" />
                                      <x-form.input value="{{ $data->expiry_date }}" labelName="Expiry Date" name="immigration_expiry_date[]" placeholder="Expiry Date" />
                                    </div>
                                  </div>
                                </div>
                                <?php $immigration_documents_inc++ ?>
                                @endforeach
                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_crew_immigration_documents" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_prev_sea_service_details" aria-expanded="true"  aria-controls="crew_prev_sea_service_details_details" > Crew Prev sea service details </button>
                          </h2>
                          <div id="crew_prev_sea_service_details" class="accordion-collapse collapse" data-bs-parent="#crew_prev_sea_service_detailsExample"  >
                            <div class="accordion-body" id="add_new_crew_prev_sea_service_details_block">
                              <div class="accordion mt-3" id="crew_prev_sea_service_detailsExample">
                                <div class="accordion mt-3" id="crew_immigration_documentsExample">
                                    <?php $prev_sea_service_details = DB::table('crew_prev_sea_service_details')->where('crew_id', $general_cv->crew_id)->get();
                                        $prev_sea_service_details_inc = 1;
                                        // dd($managements);
                                    ?>
                                 @foreach ($prev_sea_service_details as $data )
                                <div class="card accordion-item" data-id="{{ $prev_sea_service_details_inc }}">
                                  <h2 class="accordion-header" id="heading{{ $prev_sea_service_details_inc }}">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_prev_sea_service_details_{{ $prev_sea_service_details_inc }}" aria-expanded="true"  aria-controls="crew_prev_sea_service_details_details" >Data</button>
                                  </h2>
                                  <div id="crew_prev_sea_service_details_{{ $prev_sea_service_details_inc }}" class="accordion-collapse collapse show" data-bs-parent="#crew_prev_sea_service_detailsExample"  >
                                    <div class="accordion-body">
                                        <input type="hidden" name="update_prev_sea_service_details[]" value="{{ $data->id }}">
                                      <x-form.input labelName="classification Society" name="classification_society[]" placeholder="classification Society" />
                                      <x-form.input value="{{ $data->rank }}" labelName="Rank" name="rank[]" placeholder="Rank" />
                                      <x-form.input value="{{ $data->grt }}" labelName="GRT" name="grt[]" placeholder="GRT" />
                                      <x-form.input value="{{ $data->nrt }}" labelName="NRT" name="nrt[]" placeholder="NRT" />
                                      <x-form.input value="{{ $data->period_of_service }}" labelName="Period of service" name="period_of_service[]" placeholder="Period of service" />
                                      <x-form.input value="{{ $data->sign_on }}" labelName="Sign on" name="sign_on[]" placeholder="Sign on" />
                                      <x-form.input value="{{ $data->sign_off }}" labelName="Sign off" name="sign_off[]" placeholder="Sign off" />
                                      <x-form.input value="{{ $data->duration }}" labelName="Duration" name="duration[]" placeholder="Duration" />
                                      <x-form.input value="{{ $data->reason_for_sign }}" labelName="Reason for sign" name="reason_for_sign[]" placeholder="Reason for sign" />
                                    </div>
                                  </div>
                                </div>
                                <?php $prev_sea_service_details_inc++ ?>
                                @endforeach
                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_crew_prev_sea_service_details" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_qualification_certificate" aria-expanded="true"  aria-controls="crew_qualification_certificate_details" > Crew Qualification Certificate </button>
                          </h2>
                          <div id="crew_qualification_certificate" class="accordion-collapse collapse" data-bs-parent="#crew_qualification_certificateExample"  >
                            <div class="accordion-body" id="add_new_crew_qualification_certificate_block">
                              <div class="accordion mt-3" id="crew_qualification_certificateExample">
                                <?php $qualification_certificates = DB::table('crew_qualification_certificates')->where('crew_id', $general_cv->crew_id)->get();
                                        $qualification_certificates_inc = 1;
                                        // dd($managements);
                                    ?>
                                @foreach ($qualification_certificates as $data )
                                <div class="card accordion-item" data-id="{{ $qualification_certificates_inc }}">
                                  <h2 class="accordion-header" id="heading{{ $qualification_certificates_inc }}">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_qualification_certificate_{{ $qualification_certificates_inc }}" aria-expanded="true"  aria-controls="crew_qualification_certificate_details" >Data</button>
                                  </h2>
                                  <div id="crew_qualification_certificate_{{ $qualification_certificates_inc }}" class="accordion-collapse collapse show" data-bs-parent="#crew_qualification_certificateExample"  >
                                    <div class="accordion-body">
                                        <input type="hidden" name="update_qualification_certificate[]" value="{{ $data->id }}">
                                      <x-form.input value="{{ $data->qualification_title }}" labelName="Qualification Title" name="qualification_title[]" placeholder="Qualification Title" />
                                      <x-form.input value="{{ $data->certificate_type }}" labelName="Certificate Type" name="certificate_type[]" placeholder="Certificate Type" />

                                      <x-form.input value="{{ $data->cert_no }}"  labelName="Cert No" name="cert_no[]" placeholder="Cert No" />
                                      <x-form.input value="{{ $data->issue_date }}"  labelName="Issue Date" name="certificate_issue_date[]" placeholder="Issue Date" />
                                      <x-form.input value="{{ $data->expiry_date }}"  labelName="Expir Date" name="certificate_expiry_date[]" placeholder="Expir Date" />
                                      <x-form.input value="{{ $data->issued_by }}"  labelName="Issued By" name="issued_by[]" placeholder="Issued By" />
                                      <x-form.input value="{{ $data->sign_off }}"  labelName="Sign Off" name="certificate_sign_off[]" placeholder="Sign Off" />
                                    </div>
                                  </div>
                                </div>
                                <?php $prev_sea_service_details_inc++ ?>
                                @endforeach
                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_crew_qualification_certificate" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                      </div>
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
        // Vassel Management
        let crew_academic_qualificaition = '{{ count($academic_qualificaitions) }}';
        $("#add_new_crew_academic_qualificaition").click(function () {
            crew_academic_qualificaition++
            $("#crew_academic_qualificaitionExample")
            .append(`<div class="card accordion-item" data-id="`+crew_academic_qualificaition+`">
                    <h2 class="accordion-header" id="heading`+crew_academic_qualificaition+`">
                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_academic_qualificaition_`+crew_academic_qualificaition+`" aria-expanded="true"  aria-controls="crew_academic_qualificaition" >Data</button>
                    </h2>
                    <div id="crew_academic_qualificaition_`+crew_academic_qualificaition+`" class="accordion-collapse collapse show" data-bs-parent="#crew_academic_qualificaitionExample"  >
                    <div class="accordion-body">
                        <input type="hidden" name="update_academic_qualificaition[]" value="0">
                        <x-form.input labelName="From" name="from[]" placeholder="From" />
                        <x-form.input labelName="To" name="to[]" placeholder="To" />
                        <x-form.input labelName="Role" name="role[]" placeholder="Role" />
                        <x-form.input labelName="Institutions" name="institutions[]" placeholder="Institutions" />
                        <x-form.input labelName="Qualifications" name="qualifications[]" placeholder="Qualifications" />
                    </div>
                    </div>
                </div>`);
          });

        // Vassel Classification
        let crew_immigration_documents = '{{ count($immigration_documents) }}';
        $("#add_new_crew_immigration_documents").click(function () {
            crew_immigration_documents++
            // alert(vessel_classification);
            $("#crew_immigration_documentsExample")
            .append(`<div class="card accordion-item" data-id="`+crew_immigration_documents+`">
                    <h2 class="accordion-header" id="heading`+crew_immigration_documents+`">
                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_immigration_documents_`+crew_immigration_documents+`" aria-expanded="true"  aria-controls="crew_immigration_documents" >Data</button>
                    </h2>
                    <div id="crew_immigration_documents_`+crew_immigration_documents+`" class="accordion-collapse collapse show" data-bs-parent="#crew_immigration_documentsExample"  >
                    <div class="accordion-body">
                        <input type="hidden" name="update_immigration_documents[]" value="0">
                        <x-form.input labelName="Document Title" name="document_title[]" placeholder="Document Title" />
                        <x-form.input labelName="Issue at" name="issue_at[]" placeholder="Issue at" />
                        <x-form.input labelName="Issue Date" name="issue_date[]" placeholder="Issue Date" />
                        <x-form.input labelName="Expiry Date" name="expiry_date[]" placeholder="Expiry Date" />
                    </div>
                    </div>
                </div>`);
          });
        // Safety Certificates
        let crew_prev_sea_service_details = '{{ count($prev_sea_service_details) }}';
        $("#add_new_crew_prev_sea_service_details").click(function () {
            crew_prev_sea_service_details++
            // alert(vessel_classification);
            $("#crew_prev_sea_service_detailsExample")
            .append(`<div class="card accordion-item" data-id="`+crew_prev_sea_service_details+`">
                    <h2 class="accordion-header" id="heading`+crew_prev_sea_service_details+`">
                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_prev_sea_service_details_`+crew_prev_sea_service_details+`" aria-expanded="true"  aria-controls="crew_prev_sea_service_details_details" >Data</button>
                    </h2>
                    <div id="crew_prev_sea_service_details_`+crew_prev_sea_service_details+`" class="accordion-collapse collapse show" data-bs-parent="#crew_prev_sea_service_detailsExample"  >
                    <div class="accordion-body">
                        <input type="hidden" name="update_prev_sea_service_details[]" value="0">
                        <x-form.input labelName="classification Society" name="classification_society[]" placeholder="classification Society" />
                        <x-form.input labelName="Rank" name="rank[]" placeholder="Rank" />
                        <x-form.input labelName="GRT" name="grt[]" placeholder="GRT" />
                        <x-form.input labelName="NRT" name="nrt[]" placeholder="NRT" />
                        <x-form.input labelName="Period of service" name="period_of_service[]" placeholder="Period of service" />
                        <x-form.input labelName="Sign on" name="sign_on[]" placeholder="Sign on" />
                        <x-form.input labelName="Sign off" name="sign_off[]" placeholder="Sign off" />
                        <x-form.input labelName="Duration" name="duration[]" placeholder="Duration" />
                        <x-form.input labelName="Reason for sign" name="reason_for_sign[]" placeholder="Reason for sign" />
                        <x-form.input labelName="Name of company" name="name_of_company[]" placeholder="Name of company" />
                    </div>
                    </div>
                </div>`);
          });

        // Safety Certificates
        let crew_qualification_certificate = '{{ count($qualification_certificates) }}';
        $("#add_new_crew_qualification_certificate").click(function () {
            crew_qualification_certificate++
            // alert(vessel_classification);
            $("#crew_qualification_certificateExample")
            .append(`<div class="card accordion-item" data-id="`+crew_qualification_certificate+`">
                <h2 class="accordion-header" id="heading`+crew_qualification_certificate+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#crew_qualification_certificate_`+crew_qualification_certificate+`" aria-expanded="true"  aria-controls="crew_qualification_certificate_details" >Data</button>
                </h2>
                <div id="crew_qualification_certificate_`+crew_qualification_certificate+`" class="accordion-collapse collapse show" data-bs-parent="#crew_qualification_certificateExample"  >
                <div class="accordion-body">
                    <input type="hidden" name="update_qualification_certificate[]" value="0">
                    <x-form.input labelName="Qualification Title" name="qualification_title[]" placeholder="Qualification Title" />
                    <x-form.input labelName="Certificate Type" name="certificate_type[]" placeholder="Certificate Type" />
                    <x-form.input labelName="Cert No" name="cert_no[]" placeholder="Cert No" />
                    <x-form.input labelName="Issue Date" name="certificate_issue_date[]" placeholder="Issue Date" />
                    <x-form.input labelName="Expir Date" name="certificate_expiry_date[]" placeholder="Expir Date" />
                    <x-form.input labelName="Issued By" name="issued_by[]" placeholder="Issued By" />
                    <x-form.input labelName="Sign Off" name="certificate_sign_off[]" placeholder="Sign Off" />
                </div>
                </div>
            </div>`);
         });


    });
  </script>
@endpush
@endsection


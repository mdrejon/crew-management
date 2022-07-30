@extends('layouts.backend')
@section('contents')
<?php
use Illuminate\Support\Facades\DB;
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="post" action="{{ route('admin.vessel.update',[$vessel->id]) }}" enctype="multipart/form-data" >
            @method('PUT')

          @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <x-form.input labelName="Vessel Name" value="{{ $vessel->vessel_name }}" name="vessel_name" placeholder="Vessel Name" />
                    <x-form.input labelName="IMO No" value="{{ $vessel->imo_no }}" name="imo_no" placeholder="Enter here IMO no" />
                    <x-form.input type="file" labelName="Flag Image" name="flag_img" placeholder="" />
                    <x-form.input labelName="Country Name" value="{{ $vessel->country_name }}" name="country_name" placeholder="Enter country name" />
                    <x-form.input labelName="Call Sign"  value="{{ $vessel->call_sign }}" name="call_sign" placeholder="Enter call sign" />
                    <x-form.input labelName="MMSI" value="{{ $vessel->mmsi }}"  name="mmsi" placeholder="Enter MMSI" />
                    <x-form.input labelName="Gross Tonnage" value="{{ $vessel->gross_tonnage }}" name="gross_tonnage" placeholder="Enter gross tonnage" />
                    <x-form.input labelName="DWT" value="{{ $vessel->gross_tonnage }}" name="gross_tonnage" placeholder="Enter DWT" />
                    <x-form.input labelName="DWT" value="{{ $vessel->dwt }}" name="dwt" placeholder="Enter DWT" />
                    <x-form.input labelName="Type of Ship" value="{{ $vessel->type_of_ship }}" name="type_of_ship" placeholder="Enter type of ship" />
                    <x-form.input labelName="Year of Build" value="{{ $vessel->year_of_build }}" name="year_of_build" placeholder="Enter year of build" />
                    <x-form.input labelName="International Labour Organization" value="{{ $vessel->international_labour_organization }}" name="international_labour_organization" placeholder="Enter international labour organization link" />
                    <x-form.input labelName="International Transport" value="{{ $vessel->lnternational_transport }}" name="lnternational_transport" placeholder="Enter international Transport link" />
                    <x-form.input labelName="Status" value="{{ $vessel->status }}" name="status" placeholder="" />
                    <x-form.input type="number" value="{{ $vessel->Order }}" labelName="Order" name="order" placeholder="Enter Ship order Number" />

                    <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_details" aria-expanded="true"  aria-controls="vessel_management_details" > Vessel Management Details </button>
                          </h2>
                          <div id="vessel_management_details" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample"  >
                            <div class="accordion-body" id="add_new_vessel_management_block">
                              <div class="accordion mt-3" id="vessel_managementExample">
                                <?php $managements = DB::table('vessel_management_details')->where('vessel_id', $vessel->id)->get();
                                    $management_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($managements as $management )
                                    <div class="card accordion-item" data-id="{{ $management_inc }}">
                                        <h2 class="accordion-header" id="heading{{ $management_inc }}">
                                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_{{ $management_inc }}" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                                        </h2>
                                        <div id="vessel_management_{{ $management_inc }}" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample"  >
                                        <div class="accordion-body">
                                            <input type="hidden" name="update_management[]" value="{{ $management->id }}">
                                            <x-form.input labelName="Name Of Companey" value="{{ $management->name_of_company }}" name="name_of_company[]" placeholder="Name Of Companey" />
                                            <x-form.input labelName="IMO Number" value="{{ $management->imo_number }}"  name="imo_number[]" placeholder="IMO Number" />
                                            <x-form.input labelName="Role" value="{{ $management->role }}"  name="role[]" placeholder="Role" />
                                            <x-form.input labelName="Address" value="{{ $management->address }}"  value="{{ $management->address }}"   name="address[]" placeholder="Address" />
                                            <x-form.input labelName="Date Of Effect" value="{{ $management->date_of_effect }}"  name="date_of_effect[]" placeholder="Date Of Effect" />
                                            <x-form.input labelName="Status" value="{{ $management->status }}"  name="management_status[]" placeholder="Status" />
                                        </div>
                                        </div>
                                    </div>
                                    <?php $management_inc++; ?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_vessel_management" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_classification" aria-expanded="true"  aria-controls="vessel_management_details" > Vessel Classification </button>
                          </h2>
                          <div id="vessel_classification" class="accordion-collapse collapse" data-bs-parent="#vessel_managementExample"  >
                            <div class="accordion-body" id="add_new_vessel_management_block">
                              <div class="accordion mt-3" id="vessel_classificationExample">
                                <?php $classifications = DB::table('vessel_classifications')->where('vessel_id', $vessel->id)->get();
                                    $classification_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($classifications as $classification)
                                <div class="card accordion-item" data-id="{{ $classification_inc }}">
                                    <h2 class="accordion-header" id="heading{{ $classification_inc }}">
                                      <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_classification_{{ $classification_inc }}" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                                    </h2>
                                    <div id="vessel_classification_{{ $classification_inc }}" class="accordion-collapse collapse show" data-bs-parent="#vessel_classificationExample"  >
                                      <div class="accordion-body">
                                        <input type="hidden" value="{{ $classification->id }}" name="update_classification[]">
                                        <x-form.input labelName="Classification Title" value="{{ $classification->title }}" name="classification_title[]" placeholder="Classification Title" />
                                        <x-form.input labelName="Status" value="{{ $classification->status }}"  name="classification_status[]" placeholder="IMO Number" />
                                        <x-form.input labelName="Since" value="{{ $classification->since }}"   name="since[]" placeholder="Since" />
                                        <x-form.input labelName="Survey Title" value="{{ $classification->survey_title }}"  name="survey_title[]" placeholder="Survey Title" />
                                        <x-form.input labelName="Last Renewal Survey" value="{{ $classification->last_renewal_survey }}"  name="last_renewal_survey[]" placeholder="Last Renewal Survey" />
                                        <x-form.input labelName="Next Renewal Survey" value="{{ $classification->next_renewal_survey }}"   name="next_renewal_survey[]" placeholder="Next Renewal Survey" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $classification_inc++; ?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_vessel_classification" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#safety_certificates" aria-expanded="true"  aria-controls="safety_certificates_details" > Vessel Safety Certificate </button>
                          </h2>
                          <div id="safety_certificates" class="accordion-collapse collapse" data-bs-parent="#safety_certificatesExample"  >
                            <div class="accordion-body" id="add_new_safety_certificates_block">
                              <div class="accordion mt-3" id="safety_certificatesExample">
                                <?php $safety_certificates = DB::table('vessel_safety_certificates')->where('vessel_id', $vessel->id)->get();
                                    $certificate_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($safety_certificates as $certificate)
                                <div class="card accordion-item" data-id="{{ $certificate_inc}}">
                                    <h2 class="accordion-header" id="heading{{ $certificate_inc}}">
                                      <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#safety_certificates_{{ $certificate_inc}}" aria-expanded="true"  aria-controls="safety_certificates_details" >Data</button>
                                    </h2>
                                    <div id="safety_certificates_{{ $certificate_inc}}" class="accordion-collapse collapse show" data-bs-parent="#safety_certificatesExample"  >
                                      <div class="accordion-body">
                                        <input type="hidden" name="update_certificate[]" value="{{ $certificate->id }}">
                                        <x-form.input labelName="classification Society" value="{{ $certificate->classification_society }}" name="classification_society[]" placeholder="classification Society" />
                                        <x-form.input labelName="Date Survey"  value="{{ $certificate->date_survey }}" name="date_survey[]" placeholder="Date Survey" />
                                        <x-form.input labelName="Date Expiry" value="{{ $certificate->date_expiry }}"  name="date_expiry[]" placeholder="Date Expiry" />
                                        <x-form.input labelName="Date Change Status"  value="{{ $certificate->date_change_status }}"  name="date_change_status[]" placeholder="Date Change Status" />
                                        <x-form.input labelName="Reason"  value="{{ $certificate->reason }}"   name="reason[]" placeholder="Reason" />
                                        <x-form.input labelName="Top C/V"  value="{{ $certificate->top_c_v }}"  name="top_c_v[]" placeholder="Top C/V" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $certificate_inc++; ?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_safety_certificates" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_p_i_Information" aria-expanded="true"  aria-controls="vessel_p_i_Information_details" > P&I Information </button>
                          </h2>
                          <div id="vessel_p_i_Information" class="accordion-collapse collapse" data-bs-parent="#vessel_p_i_InformationExample"  >
                            <div class="accordion-body" id="add_new_vessel_p_i_Information_block">
                              <div class="accordion mt-3" id="vessel_p_i_InformationExample">
                                <?php $pi_information = DB::table('vessel_p_i__information')->where('vessel_id', $vessel->id)->get();
                                    $pi_information_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($pi_information as $information)
                                 <div class="card accordion-item" data-id="{{ $pi_information_inc }}">
                                    <h2 class="accordion-header" id="heading{{ $pi_information_inc }}">
                                      <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_p_i_Information_{{ $pi_information_inc }}" aria-expanded="true"  aria-controls="vessel_p_i_Information_details" >Data</button>
                                    </h2>
                                    <div id="vessel_p_i_Information_{{ $pi_information_inc }}" class="accordion-collapse collapse show" data-bs-parent="#vessel_p_i_InformationExample"  >
                                      <div class="accordion-body">
                                        <input type="hidden" name="update_pi_information[]" value="{{ $information->id }}">
                                        <x-form.input labelName="Title" value="{{ $information->title }}" name="p_i_title[]" placeholder="Title" />
                                        <x-form.input labelName="Inception" value="{{ $information->inception }}"  name="inception[]" placeholder="inception" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $pi_information_inc++ ?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_vessel_p_i_Information" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_geo_information" aria-expanded="true"  aria-controls="vessel_geo_information_details" > Geographical Information </button>
                          </h2>
                          <div id="vessel_geo_information" class="accordion-collapse collapse" data-bs-parent="#vessel_geo_informationExample"  >
                            <div class="accordion-body" id="add_new_vessel_geo_information_block">
                              <div class="accordion mt-3" id="vessel_geo_informationExample">
                                 <?php $geo_informations = DB::table('vessel_geo_informations')->where('vessel_id', $vessel->id)->get();
                                    $geo_information_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($geo_informations as $information)
                                 <div class="card accordion-item" data-id="{{ $geo_information_inc }}">
                                    <h2 class="accordion-header" id="heading{{ $geo_information_inc }}">
                                      <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_geo_information_{{ $geo_information_inc }}" aria-expanded="true"  aria-controls="vessel_geo_information_details" >Data</button>
                                    </h2>
                                    <div id="vessel_geo_information_{{ $geo_information_inc }}" class="accordion-collapse collapse show" data-bs-parent="#vessel_geo_informationExample">
                                      <div class="accordion-body">
                                        <input type="hidden" name="update_geo_information[]" value="{{ $information->id }}">
                                        <x-form.input labelName="Date Of Record"  value="{{ $information->date_of_record }}" name="date_of_record[]" placeholder="Date Of Record" />
                                        <x-form.input labelName="Ship Area" value="{{ $information->ship_area }}"  name="ship_area[]" placeholder="Ship Area" />
                                        <x-form.input labelName="Source" value="{{ $information->source }}" name="source[]" placeholder="Source" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $geo_information_inc++ ?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_vessel_geo_information" style="float: right;" >Add New</button>
                            </div>
                          </div>
                        </div>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_convention" aria-expanded="true"  aria-controls="vessel_convention_details" > IMO Conventions </button>
                          </h2>
                          <div id="vessel_convention" class="accordion-collapse collapse" data-bs-parent="#vessel_conventionExample"  >
                            <div class="accordion-body" id="add_new_vessel_convention_block">
                              <div class="accordion mt-3" id="vessel_conventionExample">
                                <?php $conventions = DB::table('vessel_conventions')->where('vessel_id', $vessel->id)->get();
                                    $convention_inc = 1;
                                    // dd($managements);
                                ?>
                                @foreach ($conventions as $convention )
                                 <div class="card accordion-item" data-id="{{ $convention_inc }}">
                                    <h2 class="accordion-header" id="heading{{ $convention_inc }}">
                                      <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_convention_{{ $convention_inc }}" aria-expanded="true"  aria-controls="vessel_convention_details" >Data</button>
                                    </h2>
                                    <div id="vessel_convention_{{ $convention_inc }}" class="accordion-collapse collapse show" data-bs-parent="#vessel_conventionExample">
                                      <div class="accordion-body">
                                        <input type="hidden" name="update_convention[]" value="{{ $convention->id }}">
                                        <x-form.input labelName="Convention"  value="{{ $convention->convention }}" name="convention[]" placeholder="Convention" />
                                        <x-form.input labelName="Status" value="{{ $convention->status }}" name="convention_status[]" placeholder="Status" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $convention_inc++ ;?>
                                @endforeach

                              </div>
                              <button type="button" class="btn btn-primary mt-3 mb-3" id="add_new_vessel_convention" style="float: right;" >Add New</button>
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
        let vessel_management = '{{ count($managements) }}';
        $("#add_new_vessel_management").click(function () {
            vessel_management++
            $("#vessel_managementExample")
            .append(`<div class="card accordion-item" data-id="`+vessel_management+`">
                <h2 class="accordion-header" id="heading`+vessel_management+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_`+vessel_management+`" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                </h2>
                <div id="vessel_management_`+vessel_management+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample"  >
                <div class="accordion-body">
                    <input type="hidden" name="update_management[]" value="0" >
                    <x-form.input labelName="Name Of Companey" name="name_of_company[]" placeholder="Name Of Companey" />
                    <x-form.input labelName="IMO Number" name="imo_number[]" placeholder="IMO Number" />
                    <x-form.input labelName="Role" name="role[]" placeholder="Role" />
                    <x-form.input labelName="Address" name="address[]" placeholder="Address" />
                    <x-form.input labelName="Date Of Effect" name="date_of_effect[]" placeholder="Date Of Effect" />
                    <x-form.input labelName="Status" name="management_status[]" placeholder="Status" />
                </div>
                </div>
            </div>`);
          });

        // Vassel Classification
        let vessel_classification = 1;
        $("#add_new_vessel_classification").click(function () {
            vessel_classification++
            // alert(vessel_classification);
            $("#vessel_classificationExample")
            .append(`<div class="card accordion-item" data-id="`+vessel_classification+`">
                <h2 class="accordion-header" id="heading`+vessel_classification+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_classification_`+vessel_classification+`" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                </h2>
                <div id="vessel_classification_`+vessel_classification+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_classificationExample"  >
                <div class="accordion-body">
                    <input type="hidden" value="0" name="update_classification[]">
                    <x-form.input labelName="Classification Title" name="classification_title[]" placeholder="Classification Title" />
                    <x-form.input labelName="Status" name="classification_status[]" placeholder="IMO Number" />
                    <x-form.input labelName="Since" name="since[]" placeholder="Since" />
                    <x-form.input labelName="Survey Title" name="survey_title[]" placeholder="Survey Title" />
                    <x-form.input labelName="Last Renewal Survey" name="last_renewal_survey[]" placeholder="Last Renewal Survey" />
                    <x-form.input labelName="Next Renewal Survey" name="next_renewal_survey[]" placeholder="ext Renewal Survey" />
                </div>
                </div>
            </div>`);
          });
        // Safety Certificates
        let safety_certificates = '{{ count($safety_certificates) }}';
        $("#add_new_safety_certificates").click(function () {
            safety_certificates++
            // alert(vessel_classification);
            $("#safety_certificatesExample")
            .append(`<div class="card accordion-item" data-id="`+safety_certificates+`">
                <h2 class="accordion-header" id="heading`+safety_certificates+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#safety_certificates_`+safety_certificates+`" aria-expanded="true"  aria-controls="safety_certificates_details" >Data</button>
                </h2>
                <div id="safety_certificates_`+safety_certificates+`" class="accordion-collapse collapse show" data-bs-parent="#safety_certificatesExample"  >
                <div class="accordion-body">
                    <input type="hidden" name="update_certificate[]" value="0">
                    <x-form.input labelName="classification Society" name="classification_society[]" placeholder="classification Society" />
                    <x-form.input labelName="Date Survey" name="date_survey[]" placeholder="Date Survey" />
                    <x-form.input labelName="Date Expiry" name="date_expiry[]" placeholder="Date Expiry" />
                    <x-form.input labelName="Date Change Status" name="date_change_status[]" placeholder="Date Change Status" />
                    <x-form.input labelName="Reason" name="reason[]" placeholder="Reason" />
                    <x-form.input labelName="Top C/V" name="top_c_v[]" placeholder="Top C/V" />
                </div>
                </div>
            </div>`);
          });

        // Safety Certificates
        let p_i_Information = 1;
        $("#add_new_vessel_p_i_Information").click(function () {
            p_i_Information++
            // alert(vessel_classification);
            $("#vessel_p_i_InformationExample")
            .append(`<div class="card accordion-item" data-id="`+p_i_Information+`">
                <h2 class="accordion-header" id="heading`+p_i_Information+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_p_i_Information_`+p_i_Information+`" aria-expanded="true"  aria-controls="vessel_p_i_Information_details" >Data</button>
                </h2>
                <div id="vessel_p_i_Information_`+p_i_Information+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_p_i_InformationExample"  >
                <div class="accordion-body">
                    <input type="hidden" name="update_pi_information[]" value="0">
                    <x-form.input labelName="Title" name="title[]" placeholder="Title" />
                    <x-form.input labelName="Inception" name="inception[]" placeholder="inception" />
                </div>
                </div>
            </div>`);
         });
        // Geographical Information
        let geo_information = 1;
        $("#add_new_vessel_geo_information").click(function () {
            geo_information++
            // alert(vessel_classification);
            $("#vessel_geo_informationExample")
            .append(`<div class="card accordion-item" data-id="`+geo_information+`">
                <h2 class="accordion-header" id="heading`+geo_information+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_geo_information_`+geo_information+`" aria-expanded="true"  aria-controls="vessel_geo_information_details" >Data</button>
                </h2>
                <div id="vessel_geo_information_`+geo_information+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_geo_informationExample"  >
                <div class="accordion-body">
                    <input type="hidden" name="update_geo_information[]" value="0">
                    <x-form.input labelName="Date Of Record" name="date_of_record[]" placeholder="Date Of Record" />
                    <x-form.input labelName="Ship Area" name="ship_area[]" placeholder="Ship Area" />
                    <x-form.input labelName="Source" name="source[]" placeholder="Source" />
                </div>
                </div>
            </div>`);
         });
        // IMO Conventions
        let vessel_convention = 1;
        $("#add_new_vessel_geo_information").click(function () {
            vessel_convention++
            // alert(vessel_classification);
            $("#vessel_geo_informationExample")
            .append(`<div class="card accordion-item" data-id="`+vessel_convention+`">
                <h2 class="accordion-header" id="heading`+vessel_convention+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_convention_`+vessel_convention+`" aria-expanded="true"  aria-controls="vessel_convention_details" >Data</button>
                </h2>
                <div id="vessel_convention_`+vessel_convention+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_conventionExample">
                <div class="accordion-body">
                    <input type="hidden" name="update_convention[]" value="0">
                    <x-form.input labelName="Convention" name="convention[]" placeholder="Convention" />
                    <x-form.input labelName="Status" name="convention_status[]" placeholder="Ship Area" />
                </div>
                </div>
            </div>`);
         });

    });
  </script>
@endpush
@endsection


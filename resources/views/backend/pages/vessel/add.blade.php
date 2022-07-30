@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <form method="POST" action="{{ route('admin.vessel.store') }}" enctype="multipart/form-data" >
          @csrf
            <div class="col-xxl">
                <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $title }}</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <x-form.input labelName="Vessel Name" name="vessel_name" placeholder="Vessel Name" />
                    <x-form.input labelName="IMO No" name="imo_no" placeholder="Enter here IMO no" />
                    <x-form.input type="file" labelName="Flag Image" name="flag_img" placeholder="" />
                    <x-form.input labelName="Country Name" name="country_name" placeholder="Enter country name" />
                    <x-form.input labelName="Call Sign" name="call_sign" placeholder="Enter call sign" />
                    <x-form.input labelName="MMSI" name="mmsi" placeholder="Enter MMSI" />
                    <x-form.input labelName="Gross Tonnage" name="gross_tonnage" placeholder="Enter gross tonnage" />
                    <x-form.input labelName="DWT" name="gross_tonnage" placeholder="Enter DWT" />
                    <x-form.input labelName="DWT" name="dwt" placeholder="Enter DWT" />
                    <x-form.input labelName="Type of Ship" name="type_of_ship" placeholder="Enter type of ship" />
                    <x-form.input labelName="Year of Build" name="year_of_build" placeholder="Enter year of build" />
                    <x-form.input labelName="International Labour Organization" name="international_labour_organization" placeholder="Enter international labour organization link" />
                    <x-form.input labelName="International Transport" name="lnternational_transport" placeholder="Enter international Transport link" />
                    <x-form.input labelName="Status" name="status" placeholder="" />
                    <x-form.input type="number" labelName="Order" name="order" placeholder="Enter Ship order Number" />

                    <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_details" aria-expanded="true"  aria-controls="vessel_management_details" > Vessel Management Details </button>
                          </h2>
                          <div id="vessel_management_details" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample">
                            <div class="accordion-body" id="add_new_vessel_management_block">
                              <div class="accordion mt-3" id="vessel_managementExample">
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_1" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                                  </h2>
                                  <div id="vessel_management_1" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample"  >
                                    <div class="accordion-body">
                                      <x-form.input labelName="Name Of Companey" name="name_of_company[]" placeholder="Name Of Companey" />
                                      <x-form.input labelName="IMO Number" name="imo_number[]" placeholder="IMO Number" />
                                      <x-form.input labelName="Role" name="role[]" placeholder="Role" />
                                      <x-form.input labelName="Address" name="address[]" placeholder="Address" />
                                      <x-form.input labelName="Date Of Effect" name="date_of_effect[]" placeholder="Date Of Effect" />
                                      <x-form.input labelName="Status" name="management_status[]" placeholder="Status" />
                                    </div>
                                  </div>
                                </div>
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
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_classification_1" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                                  </h2>
                                  <div id="vessel_classification_1" class="accordion-collapse collapse show" data-bs-parent="#vessel_classificationExample"  >
                                    <div class="accordion-body">
                                      <x-form.input labelName="Classification Title" name="classification_title[]" placeholder="Classification Title" />
                                      <x-form.input labelName="Status" name="classification_status[]" placeholder="IMO Number" />
                                      <x-form.input labelName="Since" name="since[]" placeholder="Since" />
                                      <x-form.input labelName="Survey Title" name="survey_title[]" placeholder="Survey Title" />
                                      <x-form.input labelName="Last Renewal Survey" name="last_renewal_survey[]" placeholder="Last Renewal Survey" />
                                      <x-form.input labelName="Next Renewal Survey" name="next_renewal_survey[]" placeholder="ext Renewal Survey" />
                                    </div>
                                  </div>
                                </div>
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
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#safety_certificates_1" aria-expanded="true"  aria-controls="safety_certificates_details" >Data</button>
                                  </h2>
                                  <div id="safety_certificates_1" class="accordion-collapse collapse show" data-bs-parent="#safety_certificatesExample"  >
                                    <div class="accordion-body">
                                      <x-form.input labelName="classification Society" name="classification_society[]" placeholder="classification Society" />
                                      <x-form.input labelName="Date Survey" name="date_survey[]" placeholder="Date Survey" />
                                      <x-form.input labelName="Date Expiry" name="date_expiry[]" placeholder="Date Expiry" />
                                      <x-form.input labelName="Date Change Status" name="date_change_status[]" placeholder="Date Change Status" />
                                      <x-form.input labelName="Reason" name="reason[]" placeholder="Reason" />
                                      <x-form.input labelName="Top C/V" name="top_c_v[]" placeholder="Top C/V" />
                                    </div>
                                  </div>
                                </div>
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
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_p_i_Information_1" aria-expanded="true"  aria-controls="vessel_p_i_Information_details" >Data</button>
                                  </h2>
                                  <div id="vessel_p_i_Information_1" class="accordion-collapse collapse show" data-bs-parent="#vessel_p_i_InformationExample"  >
                                    <div class="accordion-body">
                                      <x-form.input labelName="Title" name="p_i_title[]" placeholder="Title" />
                                      <x-form.input labelName="Inception" name="inception[]" placeholder="inception" />
                                    </div>
                                  </div>
                                </div>
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
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_geo_information_1" aria-expanded="true"  aria-controls="vessel_geo_information_details" >Data</button>
                                  </h2>
                                  <div id="vessel_geo_information_1" class="accordion-collapse collapse show" data-bs-parent="#vessel_geo_informationExample">
                                    <div class="accordion-body">
                                      <x-form.input labelName="Date Of Record" name="date_of_record[]" placeholder="Date Of Record" />
                                      <x-form.input labelName="Ship Area" name="ship_area[]" placeholder="Ship Area" />
                                      <x-form.input labelName="Source" name="source[]" placeholder="Source" />
                                    </div>
                                  </div>
                                </div>
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
                                <div class="card accordion-item" data-id="1">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_convention_1" aria-expanded="true"  aria-controls="vessel_convention_details" >Data</button>
                                  </h2>
                                  <div id="vessel_convention_1" class="accordion-collapse collapse show" data-bs-parent="#vessel_conventionExample">
                                    <div class="accordion-body">
                                      <x-form.input labelName="Convention" name="convention[]" placeholder="Convention" />
                                      <x-form.input labelName="Status" name="convention_status[]" placeholder="Status" />
                                    </div>
                                  </div>
                                </div>
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
        let vessel_management = 1;
        $("#add_new_vessel_management").click(function () {
            vessel_management++
            $("#vessel_managementExample")
            .append(`<div class="card accordion-item" data-id="`+vessel_management+`">
                <h2 class="accordion-header" id="heading`+vessel_management+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_management_`+vessel_management+`" aria-expanded="true"  aria-controls="vessel_management_details" >Data</button>
                </h2>
                <div id="vessel_management_`+vessel_management+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_managementExample"  >
                <div class="accordion-body">
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
        let safety_certificates = 1;
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
            $("#vessel_conventionExample")
            .append(`<div class="card accordion-item" data-id="`+vessel_convention+`">
                <h2 class="accordion-header" id="heading`+vessel_convention+`">
                <button type="button"  class="accordion-button" data-bs-toggle="collapse" data-bs-target="#vessel_convention_`+vessel_convention+`" aria-expanded="true"  aria-controls="vessel_convention_details" >Data</button>
                </h2>
                <div id="vessel_convention_`+vessel_convention+`" class="accordion-collapse collapse show" data-bs-parent="#vessel_conventionExample">
                <div class="accordion-body">
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


@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="card mb-4">
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{  asset('/'.$vessel->flag_img.'') }}" alt="user-avatar" class="d-block rounded" id="uploadedAvatar" width="40" height="40">
                <div class="button-wrapper">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                          <h5>{{ $vessel->vessel_name }} </h5>
                        </li>

                    </ul>
                  <p class="text-muted mb-0"><b>IMO No : </b> {{  $vessel->imo_no }}</p>
                </div>
              </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="card-body">
                    <x-form.input labelName="Country Name" disabled="disabled" value="{{ $vessel->country_name }}" name="country_name" placeholder="Enter country name" />
                    <x-form.input labelName="Call Sign" disabled="disabled" value="{{ $vessel->call_sign }}" name="call_sign" placeholder="Enter call sign" />
                    <x-form.input labelName="MMSI" disabled="disabled" value="{{ $vessel->mmsi }}"  name="mmsi" placeholder="Enter MMSI" />
                    <x-form.input labelName="Gross Tonnage" disabled="disabled" value="{{ $vessel->gross_tonnage }}" name="gross_tonnage" placeholder="Enter gross tonnage" />
                    <x-form.input labelName="DWT" disabled="disabled" value="{{ $vessel->dwt }}" name="dwt" placeholder="Enter DWT" />
                    <x-form.input labelName="Type of Ship" disabled="disabled" value="{{ $vessel->type_of_ship }}" name="type_of_ship" placeholder="Enter type of ship" />
                    <x-form.input labelName="Year of Build" disabled="disabled" value="{{ $vessel->year_of_build }}" name="year_of_build" placeholder="Enter year of build" />
                    <x-form.input labelName="International Labour Organization" disabled="disabled" value="{{ $vessel->international_labour_organization }}" name="international_labour_organization" placeholder="Enter international labour organization link" />
                    <x-form.input labelName="International Transport" disabled="disabled" value="{{ $vessel->lnternational_transport }}" name="lnternational_transport" placeholder="Enter international Transport link" />
                    <x-form.input labelName="Status" disabled="disabled" value="{{ $vessel->status }}" name="status" placeholder="" />
                    <x-form.input type="number" disabled="disabled" value="{{ $vessel->Order }}" labelName="Order" name="order" placeholder="Enter Ship order Number" />

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
                                            <x-form.input disabled="disabled" labelName="Name Of Companey" value="{{ $management->name_of_company }}" name="name_of_company[]" placeholder="Name Of Companey" />
                                            <x-form.input disabled="disabled" labelName="IMO Number" value="{{ $management->imo_number }}"  name="imo_number[]" placeholder="IMO Number" />
                                            <x-form.input disabled="disabled" labelName="Role" value="{{ $management->role }}"  name="role[]" placeholder="Role" />
                                            <x-form.input disabled="disabled" labelName="Address" value="{{ $management->address }}"  value="{{ $management->address }}"   name="address[]" placeholder="Address" />
                                            <x-form.input disabled="disabled" labelName="Date Of Effect" value="{{ $management->date_of_effect }}"  name="date_of_effect[]" placeholder="Date Of Effect" />
                                            <x-form.input disabled="disabled" labelName="Status" value="{{ $management->status }}"  name="management_status[]" placeholder="Status" />
                                        </div>
                                        </div>
                                    </div>
                                    <?php $management_inc++; ?>
                                @endforeach

                              </div>
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
                                        <x-form.input disabled="disabled" labelName="Classification Title" value="{{ $classification->title }}" name="classification_title[]" placeholder="Classification Title" />
                                        <x-form.input disabled="disabled" labelName="Status" value="{{ $classification->status }}"  name="classification_status[]" placeholder="IMO Number" />
                                        <x-form.input disabled="disabled" labelName="Since" value="{{ $classification->since }}"   name="since[]" placeholder="Since" />
                                        <x-form.input disabled="disabled" labelName="Survey Title" value="{{ $classification->survey_title }}"  name="survey_title[]" placeholder="Survey Title" />
                                        <x-form.input disabled="disabled" labelName="Last Renewal Survey" value="{{ $classification->last_renewal_survey }}"  name="last_renewal_survey[]" placeholder="Last Renewal Survey" />
                                        <x-form.input disabled="disabled" labelName="Next Renewal Survey" value="{{ $classification->next_renewal_survey }}"   name="next_renewal_survey[]" placeholder="Next Renewal Survey" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $classification_inc++; ?>
                                @endforeach

                              </div>
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
                                        <x-form.input disabled="disabled" labelName="classification Society" value="{{ $certificate->classification_society }}" name="classification_society[]" placeholder="classification Society" />
                                        <x-form.input disabled="disabled" labelName="Date Survey"  value="{{ $certificate->date_survey }}" name="date_survey[]" placeholder="Date Survey" />
                                        <x-form.input disabled="disabled" labelName="Date Expiry" value="{{ $certificate->date_expiry }}"  name="date_expiry[]" placeholder="Date Expiry" />
                                        <x-form.input disabled="disabled" labelName="Date Change Status"  value="{{ $certificate->date_change_status }}"  name="date_change_status[]" placeholder="Date Change Status" />
                                        <x-form.input disabled="disabled" labelName="Reason"  value="{{ $certificate->reason }}"   name="reason[]" placeholder="Reason" />
                                        <x-form.input disabled="disabled" labelName="Top C/V"  value="{{ $certificate->top_c_v }}"  name="top_c_v[]" placeholder="Top C/V" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $certificate_inc++; ?>
                                @endforeach

                              </div>
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
                                        <x-form.input disabled="disabled" labelName="Title" value="{{ $information->title }}" name="p_i_title[]" placeholder="Title" />
                                        <x-form.input disabled="disabled" labelName="Inception" value="{{ $information->inception }}"  name="inception[]" placeholder="inception" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $pi_information_inc++ ?>
                                @endforeach

                              </div>
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
                                        <x-form.input disabled="disabled" labelName="Date Of Record"  value="{{ $information->date_of_record }}" name="date_of_record[]" placeholder="Date Of Record" />
                                        <x-form.input disabled="disabled" labelName="Ship Area" value="{{ $information->ship_area }}"  name="ship_area[]" placeholder="Ship Area" />
                                        <x-form.input disabled="disabled" labelName="Source" value="{{ $information->source }}" name="source[]" placeholder="Source" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $geo_information_inc++ ?>
                                @endforeach

                              </div>
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
                                        <x-form.input disabled="disabled" labelName="Convention"  value="{{ $convention->convention }}" name="convention[]" placeholder="Convention" />
                                        <x-form.input disabled="disabled" labelName="Status" value="{{ $convention->status }}" name="convention_status[]" placeholder="Status" />
                                      </div>
                                    </div>
                                  </div>
                                  <?php $convention_inc++ ;?>
                                @endforeach

                              </div>
                             </div>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
            <!-- /Account -->
          </div>

    </div>
</div>
@push('script')

@endpush
@endsection


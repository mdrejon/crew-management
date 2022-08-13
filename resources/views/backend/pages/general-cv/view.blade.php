@extends('layouts.backend')
@section('contents')
<?php
use Illuminate\Support\Facades\DB;
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <!-- Account -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <td colspan="2"><strong>Position Applied</strong> <br>{{ $general_cv->position_applied }}

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Application Date </strong> <br> {{ $general_cv->application_date }} </td>
                                    <td><strong>For Vessel  </strong> <br> {{ $vessel->vessel_name }} </td>
                                </tr>
                                <tr>
                                    <td><strong>Available Date  </strong> <br> {{ $general_cv->available_date }}</td>
                                    <td><strong>Manning Agent  </strong> <br> {{ $general_cv->manning_agent }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="cv-img">
                            <img src="{{ asset($crew->img) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="6"><strong><h6>PERSONAL PARTICULARS </h6></strong></th>
                                </tr>
                                <tr>
                                    <td><strong>Last Name:</strong> <br> {{ $crew->last_name }} </td>
                                    <td><strong>Given Name (as in passport)</strong> <br> {{ $crew->given_name }} </td>
                                    <td colspan="4"><strong>Full Name: </strong> <br> {{ $crew->full_name }} </td>
                                </tr>
                                <tr>
                                    <td><strong>Place of Birth </strong> <br> {{ $crew->place_of_birth }} </td>
                                    <td><strong>Date of Birth (DD/MM/YYYY)  </strong> <br> {{ $crew->date_of_birth }} </td>
                                    <td><strong>Height </strong> <br> {{ $crew->height }} </td>
                                    <td><strong>Weight  </strong> <br> {{ $crew->weight }} </td>
                                    <td><strong>Boiler Suit  </strong> <br> {{ $crew->boiler_suit }} </td>
                                    <td><strong>Safety Shoes.  </strong> <br> {{ $crew->safety_shoes }} </td>
                                </tr>
                                <tr>
                                    <td><strong>Marital Status </strong> <br> {{ $crew->marital_status }} </td>
                                    <td><strong>Mobile No  </strong> <br> {{ $crew->mobile_no }} </td>
                                    <td><strong>Nationality</strong> <br> {{ $crew->nationality }} </td>
                                    <td><strong>Blood Type:  </strong> <br>  </td>
                                    <td><strong>HairColor: </strong> <br> {{ $crew->hair_color }} </td>
                                    <td><strong>Eyes Color:  </strong> <br> {{ $crew->eyes_color }} </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>SID No.</strong> <br> {{ $crew->sid_no }} </td>
                                    <td colspan="2"><strong>NID No</strong> <br> {{ $crew->nid_no }} </td>
                                    <td><strong>Religion </strong> <br> {{ $crew->religion }}</td>
                                    <td><strong>Covid Vaccination:  </strong> <br> {{ $crew->covid_vaccination }} </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Address.  </strong> <br> {{ $crew->address }} </td>
                                    <td colspan="3"><strong>Email: </strong> <br> {{ $crew->email }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="6"><strong><h6>HIGHEST academic qualificaition  </h6></strong></th>
                                </tr>
                                @foreach ($academic_qualificaitions as $data)
                                    <tr>
                                        <td><strong>From (DD/MM/YYYY)</strong> <br> {{ $data->from }}</td>
                                        <td><strong>To (DD/MM/YYYY)</strong> <br>  {{ $data->to }}</td>
                                        <td><strong>Institutions/Universities Name </strong> <br> {{ $data->institutions }} </td>
                                        <td><strong>Qualifications </strong> <br>  {{ $data->qualifications }} </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="6"><strong><h6>FAMILY BACKGROUND   </h6></strong></th>
                                </tr>
                                <tr>
                                    <td><strong>Next of Kin </strong> <br> {{ $crew->next_of_kin }} </td>
                                    <td><strong>Relationship </strong> <br>  {{ $crew->relationship }} </td>
                                    <td><strong>Phone No. </strong> <br>  {{ $crew->family_phone_no }} </td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Address of Next of Kin </strong> <br>  {{ $crew->address_next_of_kin }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="6"><strong><h6>immigration documents    </h6></strong></th>
                                </tr>
                                @foreach ( $immigration_documents as $data )
                                    <tr>
                                        <td><strong> Passport</strong> <br> {{ $data->document_title }}</td>
                                        <td><strong>Issued at  </strong> <br> {{ $data->issue_at }}</td>
                                        <td><strong>Issued Date (DD/MM/YYYY) </strong> <br> {{ $data->issue_date }}</td>
                                        <td><strong>Expiry Date (DD/MM/YYYY) </strong> <br> {{ $data->expiry_date }}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="12"><strong><h6>details of previous sea service  </h6></strong></th>
                                </tr>
                                <tr>
                                    <th><strong>Rank</strong></th>
                                    <th><strong>Name of Vessel</strong></th>
                                    <th><strong>Flag of Vessel</strong></th>
                                    <th><strong>Type of Vessel</strong></th>
                                    <th><strong>IMO No.</strong></th>
                                    <th><strong>GRT</strong></th>
                                    <th><strong>NRT</strong></th>
                                    <th colspan="3" class="border-bottom"><strong>Period of Service (DD/MM/YYYY)</strong>
                                        <table>
                                            <tr>
                                                <td><strong>Sign-On</strong> </td>
                                                <td><strong>Sign-Off</strong> </td>
                                                <td><strong>Duration  (mth) </strong> </td>
                                            </tr>
                                        </table>
                                    </th>
                                    <th><strong>Reason for sign-off </strong></th>
                                    <th><strong>Name of Company</strong></th>
                                </tr>
                                @foreach ($prev_sea_service_detail as $data)
                                <tr>
                                    <td>{{ $data->rank }}</td>
                                    <td>{{ $vessel->vessel_name }}</td>
                                    <td> <img src="{{ asset($vessel->flag_img) }}" height="25px" width="35px" alt=""></td>
                                    <td>{{ $vessel->type_of_ship }}</td>
                                    <td>{{ $vessel->imo_no }}</td>
                                    <td>{{ $data->grt }}</td>
                                    <td>{{ $data->nrt }}</td>
                                    <td>{{ $data->period_of_service }}</td>
                                    <td>{{ $data->sign_on }}</td>
                                    <td>{{ $data->sign_off }}</td>
                                    <td>{{ $data->duration }}</td>
                                    <td>{{ $data->reason_for_sign }}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <table class="table table-responsive">
                                <tr>
                                    <th colspan="6"><strong><h6>Qualification </h6></strong></th>
                                </tr>

                                <tr>
                                    <th><strong>{Qualification}</strong></th>
                                    <th><strong>Cert No.</strong></th>
                                    <th><strong>Issued Date (DD/MM/YYYY) </strong></th>
                                    <th><strong>Expiry Date (DD/MM/YYYY) </strong></th>
                                    <th><strong>Issued By</strong></th>
                                    <th><strong>Sign By</strong></th>
                                </tr>
                                <?php
                                 $certificates = ['general', 'professional', 'medical'];
                                 ?>
                                 @foreach ( $certificates as $certificate)
                                    <tr>
                                        <th colspan="6" style="text-align: center"><strong>{{ $certificate }} </strong></th>
                                    </tr>
                                    <?php
                                    $certificate_data = DB::table('certificates')->where('certificate_type', $certificate)->where('status', '1')->orderBy('order')->get();
                                    ?>
                                    @foreach ($certificate_data as  $data)
                                    <?php //dd($data); ?>
                                        <?php  $crew_certificate = DB::table('crew_qualification_certificates')->where('certificate_type', $certificate)->where('certificate_id', $data->id)->first();
                                        if($crew_certificate){
                                            $cert_no = $crew_certificate->cert_no;
                                            $issue_date = $crew_certificate->issue_date;
                                            $expiry_date = $crew_certificate->expiry_date;
                                            $issued_by = $crew_certificate->issued_by;
                                            $sign_off = $crew_certificate->sign_off;

                                        }else{
                                            $cert_no = '';
                                            $issue_date = '';
                                            $expiry_date = '';
                                            $issued_by = '';
                                            $sign_off = '';
                                        }
                                        ?>
                                        <tr>
                                            <td>{{ $data->certificate_title }}</td>
                                            <td>{{ $cert_no }}</td>
                                            <td>{{ $issue_date }}</td>
                                            <td>{{ $expiry_date }}</td>
                                            <td>{{ $issued_by }}</td>
                                            <td>{{ $sign_off }}</td>
                                        </tr>
                                    @endforeach
                                 @endforeach



                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <h6>Declaration to be signed by the Applicant</h6>
                            <hr>
                            <p>I hereby certify that the information contained in this form is completed & correct. I understand that the Company may terminate my service at any time if any of the above information is found to be false.</p>


                            <span class="signiture">
                                <img height="80px" src="{{ asset($general_cv->signature_of_applicant) }}" alt=""> <br>
                                <span> <strong>Date: </strong>{{ $general_cv->signature_date }}</span> <br>
                                <span class="signiture_title">Signature of Applicant/Date</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="custom-table">
                            <p>Interview by/Date: <strong>{{ $general_cv->interview_by }}</strong>/ <strong>{{ $general_cv->interview_date }}</strong>  Department: <strong>{{ $general_cv->department }}</strong> Status:  Approved / Rejected </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">

            <!-- /Account -->
          </div>

    </div>
</div>
@push('script')

@endpush
@endsection


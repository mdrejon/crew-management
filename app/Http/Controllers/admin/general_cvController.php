<?php

namespace App\Http\Controllers\admin;

use App\Models\crew;
use App\Models\vessel;
use App\Models\general_cv;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\crew_immigration_document;
use App\Models\crew_academic_qualificaition;
use App\Models\crew_prev_sea_service_details;
use App\Models\crew_qualification_certificate;

class general_cvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('General CV List','General CV List','General CV List');
        $general_cv = DB::table('general_cvs')
        ->leftJoin('vessels', 'vessels.id', '=', 'general_cvs.for_vessel')
        ->leftJoin('crews', 'crews.id', '=', 'general_cvs.crew_id')
        ->select('crews.full_name', 'vessels.vessel_name', 'general_cvs.position_applied', 'general_cvs.id', 'general_cvs.crew_id as crew_id', 'general_cvs.for_vessel as for_vessel')
        ->paginate(10);
        $certificates = DB::table('certificates')->where('status', '1')->orderBy('order')->get();

        return view('backend.pages.general-cv.index', compact('general_cv', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificates = DB::table('certificates')->where('status', '1')->orderBy('order')->get();
        $this->setPageTitle('Add New Crew','Add New Crew','Add New Crew');
        $crew = DB::table('crews')->get();
        $vessels = DB::table('vessels')->get();
        return view('backend.pages.general-cv.add', compact('crew', 'vessels', 'certificates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'crew_id' => 'required',
            'position_applied' => 'required',
            'for_vessel' => 'required',
        ]);
        if($request->application_date == 0 || $request->application_date == ''){  $application_date = '';  }else{  $application_date = $request->application_date; }
        if($request->available_date == 0 || $request->available_date == ''){  $available_date = '';  }else{  $available_date = $request->available_date; }
        if($request->manning_agent == 0 || $request->manning_agent == ''){  $manning_agent = '';  }else{  $manning_agent = $request->manning_agent; }
        if($request->signature_date == 0 || $request->signature_date == ''){  $signature_date = '';  }else{  $signature_date = $request->signature_date; }
        if($request->interview_by == 0 || $request->interview_by == ''){  $interview_by = '';  }else{  $interview_by = $request->interview_by; }
        if($request->interview_date == 0 || $request->interview_date == ''){  $interview_date = '';  }else{  $interview_date = $request->interview_date; }
        if($request->department == 0 || $request->department == ''){  $department = '';  }else{  $department = $request->department; }
        if($request->status == 0 || $request->status == ''){  $status = 1;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }

        // signature Image
        $signature_of_applicant = $this->imageUpload($request->file('signature_of_applicant'),'images/general-cv/signature/',null,null);

        $cv_id =  general_cv::insertGetId([
            'crew_id' => $request->crew_id,
            'position_applied' => $request->position_applied,
            'for_vessel' => $request->for_vessel,
            'application_date' => $application_date,
            'available_date' => $available_date,
            'manning_agent' => $manning_agent,
            'signature_of_applicant' => $signature_of_applicant,
            'signature_date' => $signature_date,
            'interview_by' => $interview_by,
            'interview_date' => $interview_date,
            'department' => $department,
            'status' => $status,
            'order' => $order,
            'create_by' => 1,
            'update_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if( $cv_id != ''){
            // Insert crew_academic_qualificaitions
            $count_crew_academic_qualificaitions  = count($request->institutions);
            if($count_crew_academic_qualificaitions > 0){
                for ($x = 0; $x < $count_crew_academic_qualificaitions; $x++) {
                    crew_academic_qualificaition::insert([
                        'crew_id' => $request->crew_id,
                        'from' => $request->from[$x],
                        'to' => $request->to[$x],
                        'institutions' => $request->institutions[$x],
                        'qualifications' => $request->qualifications[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
            // Insert crew_immigration_documents
            $count_crew_immigration_documents   = count($request->document_title);
            if($count_crew_immigration_documents > 0){
                for ($x = 0; $x < $count_crew_immigration_documents; $x++) {
                    crew_immigration_document::insert([
                        'crew_id' => $request->crew_id,
                        'document_title' => $request->document_title[$x],
                        'issue_at' => $request->issue_at[$x],
                        'issue_date' => $request->issue_date[$x],
                        'expiry_date' => $request->immigration_expiry_date[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
            // Insert crew_prev_sea_service_details
            $count_crew_prev_sea_service_details   = count($request->rank);
            if($count_crew_prev_sea_service_details > 0){
                for ($x = 0; $x < $count_crew_prev_sea_service_details; $x++) {
                    crew_prev_sea_service_details::insert([
                        'crew_id' => $request->crew_id,
                        'rank' => $request->rank[$x],
                        'vessel_id' => $request->for_vessel,
                        'grt' => $request->grt[$x],
                        'nrt' => $request->nrt[$x],
                        'period_of_service' => $request->period_of_service[$x],
                        'sign_on' => $request->sign_on[$x],
                        'sign_off' => $request->sign_off[$x],
                        'duration' => $request->duration[$x],
                        'reason_for_sign' => $request->reason_for_sign[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

             // Insert crew_qualification_certificates
             $count_crew_qualification_certificates    = count($request->qualification_title);
             if($count_crew_qualification_certificates > 0){
                 for ($x = 0; $x < $count_crew_qualification_certificates; $x++) {
                    crew_qualification_certificate::insert([
                         'crew_id' => $request->crew_id,
                         'certificate_id' => $request->certificate_id[$x],
                         'qualification_title' => $request->certificate_id[$x],
                         'certificate_type' => $request->certificate_type[$x],
                         'cert_no' => $request->cert_no[$x],
                         'issue_date' => $request->certificate_issue_date[$x],
                         'expiry_date' => $request->certificate_expiry_date[$x],
                         'issued_by' => $request->issued_by[$x],
                         'sign_off' => $request->certificate_sign_off[$x],
                         'created_at' => Carbon::now(),
                         'updated_at' => Carbon::now()
                     ]);
                 }
             }
        }
        toastr()->success('General CV Added Succesfull');
        return redirect()->route('admin.general-cv.edit', [$cv_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $general_cv = general_cv::find($id);
        $crew = crew::find($general_cv->crew_id);
        $vessel = vessel::find($general_cv->for_vessel);
        $academic_qualificaitions = DB::table('crew_academic_qualificaitions')->where('crew_id', $general_cv->crew_id)->get();
        $immigration_documents = DB::table('crew_immigration_documents')->where('crew_id', $general_cv->crew_id)->get();
        $prev_sea_service_detail = DB::table('crew_prev_sea_service_details')->where('crew_id', $general_cv->crew_id)->get();
        $qualification_certificates = DB::table('crew_qualification_certificates')->where('crew_id', $general_cv->crew_id)->get();
        $this->setPageTitle('View General CV ','View General CV','View General CV');
        return view('backend.pages.general-cv.view', compact('general_cv', 'crew', 'vessel', 'academic_qualificaitions', 'immigration_documents', 'prev_sea_service_detail', 'qualification_certificates',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificates = DB::table('certificates')->where('status', '1')->orderBy('order')->get();
        $general_cv = general_cv::find($id);
        $crew = DB::table('crews')->get();
        $vessels = DB::table('vessels')->get();
        $this->setPageTitle('Edit General CV','Edit General CV','Edit General CV');
        return view('backend.pages.general-cv.edit', compact('general_cv', 'crew', 'vessels', 'certificates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'crew_id' => 'required',
            'position_applied' => 'required',
            'for_vessel' => 'required',
        ]);
        if($request->application_date == 0 || $request->application_date == ''){  $application_date = '';  }else{  $application_date = $request->application_date; }
        if($request->available_date == 0 || $request->available_date == ''){  $available_date = '';  }else{  $available_date = $request->available_date; }
        if($request->manning_agent == 0 || $request->manning_agent == ''){  $manning_agent = '';  }else{  $manning_agent = $request->manning_agent; }
        if($request->signature_date == 0 || $request->signature_date == ''){  $signature_date = '';  }else{  $signature_date = $request->signature_date; }
        if($request->interview_by == 0 || $request->interview_by == ''){  $interview_by = '';  }else{  $interview_by = $request->interview_by; }
        if($request->interview_date == 0 || $request->interview_date == ''){  $interview_date = '';  }else{  $interview_date = $request->interview_date; }
        if($request->department == 0 || $request->department == ''){  $department = '';  }else{  $department = $request->department; }
        if($request->status == 0 || $request->status == ''){  $status = 1;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }

        // signature Image
        $signature_of_applicant = $this->imageUpload($request->file('signature_of_applicant'),'images/general-cv/signature/',null,null);

        $cv_id =  general_cv::find($id)->update([
            'crew_id' => $request->crew_id,
            'position_applied' => $request->position_applied,
            'for_vessel' => $request->for_vessel,
            'application_date' => $application_date,
            'available_date' => $available_date,
            'manning_agent' => $manning_agent,
            'signature_of_applicant' => $signature_of_applicant,
            'signature_date' => $signature_date,
            'interview_by' => $interview_by,
            'interview_date' => $interview_date,
            'department' => $department,
            'status' => $status,
            'order' => $order,
            'update_by' => 1,
            'updated_at' => Carbon::now()
        ]);
        if( $cv_id != ''){
            // Insert crew_academic_qualificaitions
            $count_crew_academic_qualificaitions  = count($request->institutions);
            if($count_crew_academic_qualificaitions > 0){
                for ($x = 0; $x < $count_crew_academic_qualificaitions; $x++) {
                    if($request->update_academic_qualificaition[$x] != 0){
                        crew_academic_qualificaition::find($request->update_academic_qualificaition[$x])->update([
                            'crew_id' => $request->crew_id,
                            'from' => $request->from[$x],
                            'to' => $request->to[$x],
                            'institutions' => $request->institutions[$x],
                            'qualifications' => $request->qualifications[$x],
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        crew_academic_qualificaition::insert([
                            'crew_id' => $request->crew_id,
                            'from' => $request->from[$x],
                            'to' => $request->to[$x],
                            'institutions' => $request->institutions[$x],
                            'qualifications' => $request->qualifications[$x],
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }
            }
            // Insert crew_immigration_documents
            $count_crew_immigration_documents   = count($request->document_title);
            if($count_crew_immigration_documents > 0){
                for ($x = 0; $x < $count_crew_immigration_documents; $x++) {
                    if($request->update_immigration_documents[$x] != 0){
                        crew_immigration_document::find($request->update_immigration_documents[$x])->update([
                            'crew_id' => $request->crew_id,
                            'document_title' => $request->document_title[$x],
                            'issue_at' => $request->issue_at[$x],
                            'issue_date' => $request->issue_date[$x],
                            'expiry_date' => $request->immigration_expiry_date[$x],
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        crew_immigration_document::insert([
                            'crew_id' => $request->crew_id,
                            'document_title' => $request->document_title[$x],
                            'issue_at' => $request->issue_at[$x],
                            'issue_date' => $request->issue_date[$x],
                            'expiry_date' => $request->immigration_expiry_date[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }
            // Insert crew_prev_sea_service_details
            $count_crew_prev_sea_service_details   = count($request->rank);
            if($count_crew_prev_sea_service_details > 0){
                for ($x = 0; $x < $count_crew_prev_sea_service_details; $x++) {
                    if($request->update_prev_sea_service_details[$x] != 0){
                        crew_prev_sea_service_details::find($request->update_prev_sea_service_details[$x])->update([
                            'crew_id' => $request->crew_id,
                            'rank' => $request->rank[$x],
                            'vessel_id' => $request->for_vessel,
                            'grt' => $request->grt[$x],
                            'nrt' => $request->nrt[$x],
                            'period_of_service' => $request->period_of_service[$x],
                            'sign_on' => $request->sign_on[$x],
                            'sign_off' => $request->sign_off[$x],
                            'duration' => $request->duration[$x],
                            'reason_for_sign' => $request->reason_for_sign[$x],
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        crew_prev_sea_service_details::insert([
                            'crew_id' => $request->crew_id,
                            'rank' => $request->rank[$x],
                            'vessel_id' => $request->for_vessel,
                            'grt' => $request->grt[$x],
                            'nrt' => $request->nrt[$x],
                            'period_of_service' => $request->period_of_service[$x],
                            'sign_on' => $request->sign_on[$x],
                            'sign_off' => $request->sign_off[$x],
                            'duration' => $request->duration[$x],
                            'reason_for_sign' => $request->reason_for_sign[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }

             // Insert crew_qualification_certificates
             $count_crew_qualification_certificates    = count($request->qualification_title);
             if($count_crew_qualification_certificates > 0){
                 for ($x = 0; $x < $count_crew_qualification_certificates; $x++) {
                    if($request->update_qualification_certificate[$x] != 0){
                        crew_qualification_certificate::find($request->update_qualification_certificate[$x])->update([
                            'crew_id' => $request->crew_id,
                            'certificate_id' => $request->certificate_id[$x],
                            'qualification_title' => $request->certificate_id[$x],
                            'certificate_type' => $request->certificate_type[$x],
                            'cert_no' => $request->cert_no[$x],
                            'issue_date' => $request->certificate_issue_date[$x],
                            'expiry_date' => $request->certificate_expiry_date[$x],
                            'issued_by' => $request->issued_by[$x],
                            'sign_off' => $request->certificate_sign_off[$x],
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        crew_qualification_certificate::insert([
                            'crew_id' => $request->crew_id,
                            'certificate_id' => $request->certificate_id[$x],
                            'qualification_title' => $request->certificate_id[$x],
                            'certificate_type' => $request->certificate_type[$x],
                            'cert_no' => $request->cert_no[$x],
                            'issue_date' => $request->certificate_issue_date[$x],
                            'expiry_date' => $request->certificate_expiry_date[$x],
                            'issued_by' => $request->issued_by[$x],
                            'sign_off' => $request->certificate_sign_off[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }


                 }
             }
        }
        toastr()->success('General CV Added Succesfull');
        return redirect()->route('admin.general-cv.edit', [$cv_id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

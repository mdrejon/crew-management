<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\crew;

class crewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Crew List','Crew List','Crew List');
        $crew = DB::table('crews')
        ->leftJoin('vessels', 'vessels.id', '=', 'crews.vessel_id')
        ->select('crews.id', 'crews.full_name', 'crews.img', 'crews.id_no', 'crews.sign_in', 'crews.sign_out', 'crews.vessel_id', 'vessels.vessel_name' )
        ->paginate(10);
        return view('backend.pages.crew.index', compact('crew'));
    }

    public function crewCertificate(Request $requests){
        // return $requests->crew_id;
        $certificate = DB::table('crew_qualification_certificates')
        ->leftJoin('certificates', 'certificates.id', '=', 'crew_qualification_certificates.certificate_id')
        ->select('crew_qualification_certificates.id', 'certificates.certificate_title', 'crew_qualification_certificates.certificate_type', 'crew_qualification_certificates.cert_no', 'crew_qualification_certificates.issue_date', 'crew_qualification_certificates.expiry_date', 'crew_qualification_certificates.issued_by', 'crew_qualification_certificates.sign_off' )
        ->where('crew_qualification_certificates.crew_id', $requests->crew_id)
        ->get();
        $html = ' <div class="custom-table">
            <table class="table table-responsive">
                <tr>
                    <th>Certificates Title</th>
                    <th>Certificates Type</th>
                    <th>Cert No.</th>
                    <th>Issued Date (DD/MM/YYYY) </th>
                    <th>Expiry Date (DD/MM/YYYY) </th>
                    <th>Issued By</th>
                    <th>Sign By</th>
                </tr>';
        foreach($certificate as $data){
            $html .= '
                <tr>
                    <td>'.$data->certificate_title.'</td>
                    <td>'.$data->certificate_type.'</td>
                    <td>'.$data->cert_no.'</td>
                    <td>'.$data->issue_date.'</td>
                    <td>'.$data->expiry_date.'</td>
                    <td>'.$data->issued_by.'</td>
                    <td>'.$data->sign_off.'</td>
                </tr>';
        }
        $html .=   '</table>
        </div>';


        return  $html;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vessels = DB::table('vessels')->get();
        $this->setPageTitle('Add New Crew','Add New Crew','Add New Crew');
        return view('backend.pages.crew.add', compact('vessels'));
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
            'id_no' => 'required',
            'vessel_id' => 'required',
            'last_name' => 'required',
            'given_name' => 'required',
            'full_name' => 'required',
            'img' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);
        if($request->vessel_id == 0 || $request->vessel_id == ''){  $vessel_id = 0;  }else{  $vessel_id = $request->vessel_id; }
        if($request->sign_in == 0 || $request->sign_in == ''){  $sign_in = '';  }else{  $sign_in = $request->sign_in; }
        if($request->sign_out == 0 || $request->sign_out == ''){  $sign_out = '';  }else{  $sign_out = $request->sign_out; }
        if($request->height == 0 || $request->height == ''){  $height = '';  }else{  $height = $request->height; }
        if($request->weight == 0 || $request->weight == ''){  $weight = '';  }else{  $weight = $request->weight; }
        if($request->boiler_suit == 0 || $request->boiler_suit == ''){  $boiler_suit = '';  }else{  $boiler_suit = $request->boiler_suit; }
        if($request->safety_shoes == 0 || $request->safety_shoes == ''){  $safety_shoes = '';  }else{  $safety_shoes = $request->safety_shoes; }
        if($request->marital_status == 0 || $request->marital_status == ''){  $marital_status = '';  }else{  $marital_status = $request->marital_status; }
        if($request->mobile_no == 0 || $request->mobile_no == ''){  $mobile_no = '';  }else{  $mobile_no = $request->mobile_no; }
        if($request->nationality == 0 || $request->nationality == ''){  $nationality = 0;  }else{  $nationality = $request->nationality; }
        if($request->hair_color == 0 || $request->hair_color == ''){  $hair_color = 0;  }else{  $hair_color = $request->hair_color; }
        if($request->eyes_color == 0 || $request->eyes_color == ''){  $eyes_color = 0;  }else{  $eyes_color = $request->eyes_color; }
        if($request->sid_no == 0 || $request->sid_no == ''){  $sid_no = 0;  }else{  $sid_no = $request->sid_no; }
        if($request->nid_no == 0 || $request->nid_no == ''){  $nid_no = '';  }else{  $nid_no = $request->nid_no; }
        if($request->religion == 0 || $request->religion == ''){  $religion = '';  }else{  $religion = $request->religion; }
        if($request->covid_vaccination == 0 || $request->covid_vaccination == ''){  $covid_vaccination = '';  }else{  $covid_vaccination = $request->covid_vaccination; }
        if($request->address == 0 || $request->address == ''){  $address = '';  }else{  $address = $request->address; }
        if($request->email == 0 || $request->email == ''){  $email = '';  }else{  $email = $request->email; }
        if($request->next_of_kin == 0 || $request->next_of_kin == ''){  $next_of_kin = '';  }else{  $next_of_kin = $request->next_of_kin; }
        if($request->relationship == 0 || $request->relationship == ''){  $relationship = '';  }else{  $relationship = $request->relationship; }
        if($request->family_phone_no == 0 || $request->family_phone_no == ''){  $family_phone_no = '';  }else{  $family_phone_no = $request->family_phone_no; }
        if($request->address_next_of_kin == 0 || $request->address_next_of_kin == ''){  $address_next_of_kin = '';  }else{  $address_next_of_kin = $request->address_next_of_kin; }
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }

        // Crew Image
        $img = $this->imageUpload($request->file('img'),'images/crew/image/',null,null);

         // Insert Crew And Get The id
         $crew =  crew::insertGetId([
            'id_no' => $request->id_no,
            'last_name' => $request->last_name,
            'given_name' => $request->given_name,
            'full_name' => $request->full_name,
            'vessel_id' => $vessel_id,
            'sign_in' => $sign_in,
            'sign_out' => $sign_out,
            'img' => $img,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'height' => $height,
            'weight' => $weight,
            'boiler_suit' => $boiler_suit,
            'safety_shoes' => $safety_shoes,
            'marital_status' => $marital_status,
            'mobile_no' => $mobile_no,
            'nationality' => $nationality,
            'hair_color' => $hair_color,
            'eyes_color' => $eyes_color,
            'sid_no' => $sid_no,
            'nid_no' => $nid_no,
            'religion' => $religion,
            'covid_vaccination' => $covid_vaccination,
            'address' => $address,
            'email' => $email,
            'next_of_kin' => $next_of_kin,
            'relationship' => $relationship,
            'family_phone_no' => $family_phone_no,
            'address_next_of_kin' => $address_next_of_kin,
            'status' => $status,
            'order' => $order,
            'create_by' => 1,
            'update_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Crew Added Succesfull');
        return redirect()->route('admin.crew.edit', [$crew]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crew = crew::find($id);
        $this->setPageTitle('View Crew','View Crew','View Crew');
        return view('backend.pages.crew.view', compact('crew'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vessels = DB::table('vessels')->get();
        $crew = crew::find($id);
        $this->setPageTitle('Edit Crew','Edit Crew','Edit Crew');
        return view('backend.pages.crew.edit', compact('crew', 'vessels'));
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
            'id_no' => 'required',
            'vessel_id' => 'required',
            'last_name' => 'required',
            'given_name' => 'required',
            'full_name' => 'required',
            // 'img' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);
        if($request->vessel_id == 0 || $request->vessel_id == ''){  $vessel_id = 0;  }else{  $vessel_id = $request->vessel_id; }
        if($request->sign_in == 0 || $request->sign_in == ''){  $sign_in = '';  }else{  $sign_in = $request->sign_in; }
        if($request->sign_out == 0 || $request->sign_out == ''){  $sign_out = '';  }else{  $sign_out = $request->sign_out; }
        if($request->height == 0 || $request->height == ''){  $height = '';  }else{  $height = $request->height; }
        if($request->weight == 0 || $request->weight == ''){  $weight = '';  }else{  $weight = $request->weight; }
        if($request->boiler_suit == 0 || $request->boiler_suit == ''){  $boiler_suit = '';  }else{  $boiler_suit = $request->boiler_suit; }
        if($request->safety_shoes == 0 || $request->safety_shoes == ''){  $safety_shoes = '';  }else{  $safety_shoes = $request->safety_shoes; }
        if($request->marital_status == 0 || $request->marital_status == ''){  $marital_status = '';  }else{  $marital_status = $request->marital_status; }
        if($request->mobile_no == 0 || $request->mobile_no == ''){  $mobile_no = '';  }else{  $mobile_no = $request->mobile_no; }
        if($request->nationality == 0 || $request->nationality == ''){  $nationality = 0;  }else{  $nationality = $request->nationality; }
        if($request->hair_color == 0 || $request->hair_color == ''){  $hair_color = 0;  }else{  $hair_color = $request->hair_color; }
        if($request->eyes_color == 0 || $request->eyes_color == ''){  $eyes_color = 0;  }else{  $eyes_color = $request->eyes_color; }
        if($request->sid_no == 0 || $request->sid_no == ''){  $sid_no = 0;  }else{  $sid_no = $request->sid_no; }
        if($request->nid_no == 0 || $request->nid_no == ''){  $nid_no = '';  }else{  $nid_no = $request->nid_no; }
        if($request->religion == 0 || $request->religion == ''){  $religion = '';  }else{  $religion = $request->religion; }
        if($request->covid_vaccination == 0 || $request->covid_vaccination == ''){  $covid_vaccination = '';  }else{  $covid_vaccination = $request->covid_vaccination; }
        if($request->address == 0 || $request->address == ''){  $address = '';  }else{  $address = $request->address; }
        if($request->email == 0 || $request->email == ''){  $email = '';  }else{  $email = $request->email; }
        if($request->next_of_kin == 0 || $request->next_of_kin == ''){  $next_of_kin = '';  }else{  $next_of_kin = $request->next_of_kin; }
        if($request->relationship == 0 || $request->relationship == ''){  $relationship = '';  }else{  $relationship = $request->relationship; }
        if($request->family_phone_no == 0 || $request->family_phone_no == ''){  $family_phone_no = '';  }else{  $family_phone_no = $request->family_phone_no; }
        if($request->address_next_of_kin == 0 || $request->address_next_of_kin == ''){  $address_next_of_kin = '';  }else{  $address_next_of_kin = $request->address_next_of_kin; }
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }

        // Crew Image
        $img = $this->imageUpload($request->file('img'),'images/crew/image/',null,null);
        if($img != ''){
            $img = $img;
        }else{
            $img = $request->old_img;
        }
        // Insert Crew And Get The id
        $crew =  crew::find($id)->update([
            'id_no' => $request->id_no,
            'last_name' => $request->last_name,
            'given_name' => $request->given_name,
            'full_name' => $request->full_name,
            'sign_in' => $sign_in,
            'sign_out' => $sign_out,
            'vessel_id' => $vessel_id,
            'img' => $img,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'height' => $height,
            'weight' => $weight,
            'boiler_suit' => $boiler_suit,
            'safety_shoes' => $safety_shoes,
            'marital_status' => $marital_status,
            'mobile_no' => $mobile_no,
            'nationality' => $nationality,
            'hair_color' => $hair_color,
            'eyes_color' => $eyes_color,
            'sid_no' => $sid_no,
            'nid_no' => $nid_no,
            'religion' => $religion,
            'covid_vaccination' => $covid_vaccination,
            'address' => $address,
            'email' => $email,
            'next_of_kin' => $next_of_kin,
            'relationship' => $relationship,
            'family_phone_no' => $family_phone_no,
            'address_next_of_kin' => $address_next_of_kin,
            'status' => $status,
            'order' => $order,
            'update_by' => 1,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Crew Update Succesfull');
        return redirect()->route('admin.crew.edit', [$id]);
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

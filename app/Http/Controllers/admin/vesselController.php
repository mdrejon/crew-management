<?php

namespace App\Http\Controllers\admin;

use App\Models\vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\vessel_convention;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\vessel_classification;
use App\Models\vessel_geo_information;
use App\Models\vessel_p_i_Information;
use App\Models\vessel_management_details;
use App\Models\vessel_safety_certificate;

class vesselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Vessels','Vessel','Vessel');
        $vassels = DB::table('vessels')->paginate(10);
        return view('backend.pages.vessel.index', compact('vassels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Add New Vessel','Add New Vessel','Add New Vessel');
        return view('backend.pages.vessel.add');
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
            'imo_no' => 'required',
        ]);
        if($request->imo_no == 0 || $request->imo_no == ''){  $imo_no = '';  }else{  $imo_no = $request->imo_no; }
        if($request->vessel_name == 0 || $request->vessel_name == ''){  $vessel_name = '';  }else{  $vessel_name = $request->vessel_name; }
        if($request->country_name == 0 || $request->country_name == ''){  $country_name = '';  }else{  $country_name = $request->country_name; }
        if($request->call_sign == 0 || $request->call_sign == ''){  $call_sign = '';  }else{  $call_sign = $request->call_sign; }
        if($request->mmsi == 0 || $request->mmsi == ''){  $mmsi = '';  }else{  $mmsi = $request->mmsi; }
        if($request->gross_tonnage == 0 || $request->gross_tonnage == ''){  $gross_tonnage = '';  }else{  $gross_tonnage = $request->gross_tonnage; }
        if($request->dwt == 0 || $request->dwt == ''){  $dwt = 0;  }else{  $dwt = $request->dwt; }
        if($request->type_of_ship == 0 || $request->type_of_ship == ''){  $type_of_ship = 0;  }else{  $type_of_ship = $request->type_of_ship; }
        if($request->year_of_build == 0 || $request->year_of_build == ''){  $year_of_build = 0;  }else{  $year_of_build = $request->year_of_build; }
        if($request->international_labour_organization == 0 || $request->international_labour_organization == ''){  $international_labour_organization = 0;  }else{  $international_labour_organization = $request->international_labour_organization; }
        if($request->lnternational_transport == 0 || $request->lnternational_transport == ''){  $lnternational_transport = 0;  }else{  $lnternational_transport = $request->lnternational_transport; }
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }
        if($request->name_of_company == 0 || $request->name_of_company == ''){  $name_of_company = 0;  }else{  $name_of_company = $request->name_of_company; }

        // Flag Image
        $flag_img = $this->imageUpload($request->file('flag_img'),'images/vessel/country/',null,null);

        // Insert Vessel And Get The id
        $vessel_id =  vessel::insertGetId([
            'imo_no' => $vessel_name,
            'imo_no' => $imo_no,
            'flag_img' => $flag_img,
            'country_name' => $country_name,
            'call_sign' => $call_sign,
            'mmsi' => $mmsi,
            'gross_tonnage' => $gross_tonnage,
            'dwt' => $dwt,
            'type_of_ship' => $type_of_ship,
            'year_of_build' => $year_of_build,
            'international_labour_organization' => $international_labour_organization,
            'lnternational_transport' => $lnternational_transport,
            'status' => $status,
            'order' => $order,
            'create_by' => $order,
            'update_by' => $order,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($vessel_id){
             // Insert Vessel  Management
            $count_management = count($request->name_of_company);
            if($count_management > 0){
                for ($x = 0; $x < $count_management; $x++) {
                    vessel_management_details::insert([
                        'vessel_id' => $vessel_id,
                        'name_of_company' => $request->name_of_company[$x],
                        'imo_number' => $request->imo_number[$x],
                        'role' => $request->role[$x],
                        'address' => $request->address[$x],
                        'date_of_effect' => $request->date_of_effect[$x],
                        'status' => $request->management_status[$x],
                        'order' => 0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

            // Vessel Classification
            $count_classification = count($request->classification_status);
            if($count_classification > 0){
                for ($x = 0; $x < $count_classification; $x++) {
                    vessel_classification::insert([
                        'vessel_id' => $vessel_id,
                        'title' => $request->classification_title[$x],
                        'status' => $request->classification_status[$x],
                        'since' => $request->since[$x],
                        'survey_title' => $request->survey_title[$x],
                        'last_renewal_survey' => $request->last_renewal_survey[$x],
                        'next_renewal_survey' => $request->next_renewal_survey[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

            // Vessel Safety Certificate
            $count_safety_certificate = count($request->classification_society);
            if($count_safety_certificate > 0){
                for ($x = 0; $x < $count_safety_certificate; $x++) {
                    vessel_safety_certificate::insert([
                        'vessel_id' => $vessel_id,
                        'classification_society' => $request->classification_society[$x],
                        'date_survey' => $request->date_survey[$x],
                        'date_expiry' => $request->date_expiry[$x],
                        'date_change_status' => $request->date_change_status[$x],
                        'reason' => $request->reason[$x],
                        'top_c_v' => $request->top_c_v[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

            // P&I Information
            $count_p_i = count($request->p_i_title);
            if($count_p_i > 0){
                for ($x = 0; $x < $count_p_i; $x++) {
                    vessel_p_i_Information::insert([
                        'vessel_id' => $vessel_id,
                        'title' => $request->p_i_title[$x],
                        'inception' => $request->inception[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

            // Geographical Information
            $count_geo_information = count($request->date_of_record);
            if($count_geo_information > 0){
                for ($x = 0; $x < $count_geo_information; $x++) {
                    vessel_geo_information::insert([
                        'vessel_id' => $vessel_id,
                        'date_of_record' => $request->date_of_record[$x],
                        'ship_area' => $request->ship_area[$x],
                        'source' => $request->source[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
            // IMO Conventions
            $count_vessel_convention = count($request->date_of_record);
            if($count_vessel_convention > 0){
                for ($x = 0; $x < $count_vessel_convention; $x++) {
                    vessel_convention::insert([
                        'vessel_id' => $vessel_id,
                        'convention' => $request->convention[$x],
                        'status' => $request->convention_status[$x],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
        }
         toastr()->success('Vessel Added Succesfull');
        return redirect()->route('admin.vessel.edit', [$vessel_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vessel = vessel::find($id);
        $this->setPageTitle('Edit Vessel','Edit Vessel','Edit Vessel');
        return view('backend.pages.vessel.view', compact('vessel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vessel = vessel::find($id);
        $this->setPageTitle('Edit Vessel','Edit Vessel','Edit Vessel');
        return view('backend.pages.vessel.edit', compact('vessel'));
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
        // dd($id);
        $validatedData = $request->validate([
            'imo_no' => 'required',
        ]);
        if($request->imo_no == 0 || $request->imo_no == ''){  $imo_no = '';  }else{  $imo_no = $request->imo_no; }
        if($request->vessel_name == 0 || $request->vessel_name == ''){  $vessel_name = '';  }else{  $vessel_name = $request->vessel_name; }
        if($request->country_name == 0 || $request->country_name == ''){  $country_name = '';  }else{  $country_name = $request->country_name; }
        if($request->call_sign == 0 || $request->call_sign == ''){  $call_sign = '';  }else{  $call_sign = $request->call_sign; }
        if($request->mmsi == 0 || $request->mmsi == ''){  $mmsi = '';  }else{  $mmsi = $request->mmsi; }
        if($request->gross_tonnage == 0 || $request->gross_tonnage == ''){  $gross_tonnage = '';  }else{  $gross_tonnage = $request->gross_tonnage; }
        if($request->dwt == 0 || $request->dwt == ''){  $dwt = 0;  }else{  $dwt = $request->dwt; }
        if($request->type_of_ship == 0 || $request->type_of_ship == ''){  $type_of_ship = 0;  }else{  $type_of_ship = $request->type_of_ship; }
        if($request->year_of_build == 0 || $request->year_of_build == ''){  $year_of_build = 0;  }else{  $year_of_build = $request->year_of_build; }
        if($request->international_labour_organization == 0 || $request->international_labour_organization == ''){  $international_labour_organization = 0;  }else{  $international_labour_organization = $request->international_labour_organization; }
        if($request->lnternational_transport == 0 || $request->lnternational_transport == ''){  $lnternational_transport = 0;  }else{  $lnternational_transport = $request->lnternational_transport; }
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }
        if($request->name_of_company == 0 || $request->name_of_company == ''){  $name_of_company = 0;  }else{  $name_of_company = $request->name_of_company; }

        // Flag Image
        $flag_img = $this->imageUpload($request->file('flag_img'),'vessel/country/',null,null);
        // dd($flag_img);
        // Insert Vessel And Get The id
        $vessel_id =  vessel::find($id)->update([
            'vessel_name' => $vessel_name,
            'imo_no' => $imo_no,
            'flag_img' => $flag_img,
            'country_name' => $country_name,
            'call_sign' => $call_sign,
            'mmsi' => $mmsi,
            'gross_tonnage' => $gross_tonnage,
            'dwt' => $dwt,
            'type_of_ship' => $type_of_ship,
            'year_of_build' => $year_of_build,
            'international_labour_organization' => $international_labour_organization,
            'lnternational_transport' => $lnternational_transport,
            'status' => $status,
            'order' => $order,
            'create_by' => $order,
            'update_by' => $order,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($id){
             // Insert Vessel  Management
            $count_management = count($request->name_of_company);
            if($count_management > 0){
                for ($x = 0; $x < $count_management; $x++) {
                    if($request->update_management[$x] != 0){
                        vessel_management_details::find($request->update_management[$x])->update([
                            'vessel_id' => $id,
                            'name_of_company' => $request->name_of_company[$x],
                            'imo_number' => $request->imo_number[$x],
                            'role' => $request->role[$x],
                            'address' => $request->address[$x],
                            'date_of_effect' => $request->date_of_effect[$x],
                            'status' => $request->management_status[$x],
                            'order' => 0,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_management_details::insert([
                            'vessel_id' => $id,
                            'name_of_company' => $request->name_of_company[$x],
                            'imo_number' => $request->imo_number[$x],
                            'role' => $request->role[$x],
                            'address' => $request->address[$x],
                            'date_of_effect' => $request->date_of_effect[$x],
                            'status' => $request->management_status[$x],
                            'order' => 0,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }

            // Vessel Classification
            $count_classification = count($request->classification_status);
            if($count_classification > 0){
                for ($x = 0; $x < $count_classification; $x++) {
                    if($request->update_classification[$x] != 0){
                        vessel_classification::find($request->update_classification[$x])->update([
                            'vessel_id' => $id,
                            'title' => $request->classification_title[$x],
                            'status' => $request->classification_status[$x],
                            'since' => $request->since[$x],
                            'survey_title' => $request->survey_title[$x],
                            'last_renewal_survey' => $request->last_renewal_survey[$x],
                            'next_renewal_survey' => $request->next_renewal_survey[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_classification::insert([
                            'vessel_id' => $id,
                            'title' => $request->classification_title[$x],
                            'status' => $request->classification_status[$x],
                            'since' => $request->since[$x],
                            'survey_title' => $request->survey_title[$x],
                            'last_renewal_survey' => $request->last_renewal_survey[$x],
                            'next_renewal_survey' => $request->next_renewal_survey[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }

            // Vessel Safety Certificate
            $count_safety_certificate = count($request->classification_society);
            if($count_safety_certificate > 0){
                for ($x = 0; $x < $count_safety_certificate; $x++) {
                    if($request->update_certificate[$x] != 0){
                        vessel_safety_certificate::find($request->update_certificate[$x])->update([
                            'vessel_id' => $id,
                            'classification_society' => $request->classification_society[$x],
                            'date_survey' => $request->date_survey[$x],
                            'date_expiry' => $request->date_expiry[$x],
                            'date_change_status' => $request->date_change_status[$x],
                            'reason' => $request->reason[$x],
                            'top_c_v' => $request->top_c_v[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_safety_certificate::insert([
                            'vessel_id' => $id,
                            'classification_society' => $request->classification_society[$x],
                            'date_survey' => $request->date_survey[$x],
                            'date_expiry' => $request->date_expiry[$x],
                            'date_change_status' => $request->date_change_status[$x],
                            'reason' => $request->reason[$x],
                            'top_c_v' => $request->top_c_v[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }

            // P&I Information
            $count_p_i = count($request->p_i_title);
            if($count_p_i > 0){
                for ($x = 0; $x < $count_p_i; $x++) {
                    if($request->update_pi_information[$x] != 0){
                        vessel_p_i_Information::find($request->update_pi_information[$x])->update([
                            'vessel_id' => $id,
                            'title' => $request->p_i_title[$x],
                            'inception' => $request->inception[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_p_i_Information::insert([
                            'vessel_id' => $id,
                            'title' => $request->p_i_title[$x],
                            'inception' => $request->inception[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }

            // Geographical Information
            $count_geo_information = count($request->date_of_record);
            if($count_geo_information > 0){
                for ($x = 0; $x < $count_geo_information; $x++) {
                    if($request->update_geo_information[$x] != 0){
                        vessel_geo_information::find($request->update_geo_information[$x])->update([
                            'vessel_id' => $id,
                            'date_of_record' => $request->date_of_record[$x],
                            'ship_area' => $request->ship_area[$x],
                            'source' => $request->source[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_geo_information::insert([
                            'vessel_id' => $id,
                            'date_of_record' => $request->date_of_record[$x],
                            'ship_area' => $request->ship_area[$x],
                            'source' => $request->source[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }
            // IMO Conventions
            $count_vessel_convention = count($request->date_of_record);
            if($count_vessel_convention > 0){
                for ($x = 0; $x < $count_vessel_convention; $x++) {
                    if($request->update_convention[$x] != 0){
                        vessel_convention::find($request->update_convention[$x])->update([
                            'vessel_id' => $id,
                            'convention' => $request->convention[$x],
                            'status' => $request->convention_status[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }else{
                        vessel_convention::insert([
                            'vessel_id' => $id,
                            'convention' => $request->convention[$x],
                            'status' => $request->convention_status[$x],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }

                }
            }
        }
         toastr()->success('Vessel Update Succesfull');
        return redirect()->route('admin.vessel.edit', [$id]);

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

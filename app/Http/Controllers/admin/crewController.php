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
        $crew = DB::table('crews')->paginate(10);
        return view('backend.pages.vessel.index', compact('crew'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Add New Crew','Add New Crew','Add New Crew');
        return view('backend.pages.crew.add');
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
            'last_name' => 'required',
            'given_name' => 'required',
            'full_name' => 'required',
            'img' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);
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
            'last_name' => $request->last_name,
            'given_name' => $request->given_name,
            'full_name' => $request->full_name,
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
        $this->setPageTitle('Edit Crew','Edit Crew','Edit Crew');
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
        $crew = crew::find($id);
        $this->setPageTitle('Edit Crew','Edit Crew','Edit Crew');
        return view('backend.pages.crew.edit', compact('crew'));
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
            'last_name' => 'required',
            'given_name' => 'required',
            'full_name' => 'required',
            // 'img' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
        ]);
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
            'last_name' => $request->last_name,
            'given_name' => $request->given_name,
            'full_name' => $request->full_name,
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

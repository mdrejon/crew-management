<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\certificate;

class certificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Add New Certificate','Add New Certificate','Add New Certificate');
        return view('backend.pages.certificate.add');
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
            'certificate_type' => 'required',
            'certificate_title' => 'required',
        ]);
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }


         // Insert Crew And Get The id
         $certificate =  certificate::insertGetId([
            'certificate_type' => $request->certificate_type,
            'certificate_title' => $request->certificate_title,
            'status' => $status,
            'order' => $order,
            'create_by' => 1,
            'update_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Certificate Added Succesfull');
        return redirect()->route('admin.certificate.edit', [$certificate]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = certificate::find($id);
        $this->setPageTitle('Edit New Certificate','Edit New Certificate','Edit New Certificate');
        return view('backend.pages.certificate.edit', compact('certificate'));
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
            'certificate_type' => 'required',
            'certificate_title' => 'required',
        ]);
        if($request->status == 0 || $request->status == ''){  $status = 0;  }else{  $status = $request->status; }
        if($request->order == 0 || $request->order == ''){  $order = 0;  }else{  $order = $request->order; }


         // Insert Crew And Get The id
         $certificate =  certificate::find($id)->update([
            'certificate_type' => $request->certificate_type,
            'certificate_title' => $request->certificate_title,
            'status' => $status,
            'order' => $order,
            'update_by' => 1,
            'updated_at' => Carbon::now()
        ]);
        toastr()->success('Certificate Update Succesfull');
        return redirect()->back();
    }


    // certificateGeneral
    public function certificateGeneral (){
        $certificate = certificate::where('certificate_type', 'general')->get();
        $this->setPageTitle('General Certificate','General Certificate','General Certificate');
        return view('backend.pages.certificate.general', compact('certificate'));
    }
    public function certificateProfessional(){
        $certificate = certificate::where('certificate_type', 'professional')->get();
        $this->setPageTitle('Professional Certificate','Professional Certificate','Professional Certificate');
        return view('backend.pages.certificate.professional', compact('certificate'));
    }
    public function certificateMedical(){
        $certificate = certificate::where('certificate_type', 'medical')->get();
        $this->setPageTitle('Medical Certificate','Medical Certificate','Medical Certificate');
        return view('backend.pages.certificate.medical', compact('certificate'));
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

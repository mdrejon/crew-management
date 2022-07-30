<?php

namespace App\Http\Controllers\admin;

use toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function dashboard(){
        // toastr()->error('An error has occurred please try again later.');
        return view('backend.dashboard');
    }
}

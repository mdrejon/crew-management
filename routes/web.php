<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\crewController;
use App\Http\Controllers\admin\vesselController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\general_cvController;
use App\Http\Controllers\admin\certificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('admin.dashboard');
});

// Route::middleware([ 'auth:sanctum',  config('jetstream.auth_session'), 'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('backend.dashboard');
//     })->name('dashboard');
// });
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth:sanctum','verified']], function(){
    //---------------- Dashboard ---------------//
    Route::get('dashboard',[dashboardController::class, 'dashboard'])->name('dashboard');
    //---------------- Vessel -----------------//
    Route::resource('vessel',vesselController::class);
    //---------------- Crew -----------------//

    Route::post('/crew/crew-ertificate/',[crewController::class, 'crewCertificate'])->name('crewCertificate');
    Route::resource('crew',crewController::class);
    //---------------- General CV -----------------//
    Route::get('/certificate/professional/',[certificateController::class, 'certificateProfessional'])->name('certificate.professional');

    Route::get('/certificate/general/',[certificateController::class, 'certificateGeneral'])->name('certificate.general');
   Route::get('/certificate/medical/',[certificateController::class, 'certificateMedical'])->name('certificate.medical');
    Route::get('/certificate/flag-state/',[certificateController::class, 'certificateFlag'])->name('certificate.flag-state ');

    Route::resource('certificate',certificateController::class);
   //---------------- General CV -----------------//
    Route::resource('general-cv',general_cvController::class);

});

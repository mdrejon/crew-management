<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\crewController;
use App\Http\Controllers\admin\vesselController;
use App\Http\Controllers\admin\dashboardController;

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
    Route::resource('crew',crewController::class);
    //

});

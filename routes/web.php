<?php

use App\Http\Controllers\admin\dashboardController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
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
    //---------------- Category -----------------//

});

<?php

use App\Http\Controllers\Auth\AdminPhotoController;
use App\Http\Controllers\ConstitutionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function (Request $request) {


//     $user = $request->user();


    

// })->middleware(['auth', 'verified'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    Route::resource('/dashboard', HomeController::class);
    Route::put('/profile', [AdminPhotoController::class, 'update_photo'])->name('profile.admin_update_photo');
    Route::resource('/member', MemberController::class);
    Route::resource('/district', DistrictController::class);
    Route::resource('/pollingstation', PollingController::class);
    Route::resource('/constituency', ConstitutionController::class);




});

require __DIR__ . '/auth.php';

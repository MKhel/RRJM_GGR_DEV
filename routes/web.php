<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Livewire\AdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Applicant;
use App\Http\Livewire\ApplicantInfo;
use App\Http\Livewire\Classes;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Announcements;
use App\Http\Livewire\UserActivities;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class, function () {
        return view('livewire.dashboard');
    })->name('dashboard');
    Route::get('/', Dashboard::class, function () {
        return view('livewire.dashboard');
    })->name('dashboard');
});


Route::middleware([ 'auth:sanctum', 'verified'])->get('/applicants', Applicant::class, function () {
        return view('livewire.applicants');
})->name('applicants');


Route::middleware([ 'auth:sanctum', 'verified'])->get('/client-class', Applicant::class, function () {
    return view('livewire.classes');
})->name('client-class');

Route::middleware([ 'auth:sanctum', 'verified'])->get('/classes', Classes::class, function () {
    return view('livewire.classes');
})->name('classes');


Route::middleware([ 'auth:sanctum', 'verified'])->get('/applicantinfo/{id}', ApplicantInfo::class, function () {
    return view('livewire.applicant-info');
})->name('applicantinfo');

// Route::middleware([ 'auth:sanctum', 'verified'])->get('/userActivities/{id}', [App\Http\Controllers\userActivities::class, 'showUserAcivities'], function () {
//     return view('livewire.admin.user-activities');
// })->name('userActivities');

Route::middleware([ 'auth:sanctum', 'verified'])->get('/userActivities/{id}', UserActivities::class, function () {
    return view('livewire.admin.user-activities');
})->name('userActivities');


Route::middleware([ 'auth:sanctum', 'verified'])->get('/announcements', Announcements::class, function () {
    return view('livewire.announcements');
})->name('announcements');
Route::middleware([ 'auth:sanctum', 'verified'])->get('/admin-panel', AdminPanel::class, function () {
    return view('livewire.admin-panel');
})->name('admin_panel');
// Route::middleware([ 'auth:sanctum', 'verified'])->get('/applicantinfo', ApplicantInfo::class, function () {
//     return view('livewire.applicant-info');
// })->name('applicantinfo');

// route()


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     // Route::resource('/applicants', ApplicantController::class);
//     // Route::get('/applicant', Applicant::class);
//     Route::resource('client', ApplicantController::class); 
// });



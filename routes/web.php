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
use App\Models\UserActivities as ModelsUserActivities;

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

Route::middleware([ 'auth:sanctum', 'verified'])->get('/users/export', [App\Http\Controllers\UserExportController::class, 'export'], function () {
    return view('livewire.applicant');
})->name('export');
Route::middleware([ 'auth:sanctum', 'verified'])->get('/users/exportActivities', [App\Http\Controllers\UserExportController::class, 'exportActivities'], function () {
    return view('livewire.applicant');
})->name('exportActivities');
Route::get('/show-pdf', function()
{
    return view('livewire.admin.export.user-activities', [
        'userDataActivity' =>  ModelsUserActivities::all()
    ]);
});

//viewing pdf
Route::get('/view/pdf/{id}', [App\Http\Controllers\PDFExportController::class, 'viewPDF'])->name('view.pdf');

//view resume pdf
Route::get('/view/resume/{id}', [App\Http\Controllers\PDFExportController::class, 'viewPDFresume'])->name('view.pdfresume');

//convert resume pdf
Route::get('/pdf/resume/{id}', [App\Http\Controllers\PDFExportController::class, 'convertPDFresume'])->name('convert.pdfresume');

//conversion pdf
Route::get('/convert/pdf/{id}', [App\Http\Controllers\PDFExportController::class, 'convertPDF'])->name('convertPDF');


Route::middleware([ 'auth:sanctum', 'verified'])->get('/notify', Applicant::class, 'notify');
Route::get('/markasread/{id}', [App\Http\Livewire\Applicant::class, 'markasread'])->name('markasread');


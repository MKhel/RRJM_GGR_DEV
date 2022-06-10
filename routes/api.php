<?php

use App\Http\Livewire\Applicant;
use App\Models\Applicant as ModelsApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/testing-api', function (Request $request) {
    return ['message' => 'hello world'];
});

// Route::apiResource('applicant/show', [App\Http\Livewire\Applicant::class])->only('');
Route::get('/testing-api', function()
{
    $applicant = ModelsApplicant::all();
    return [$applicant];
}); 
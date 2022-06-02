<?php

namespace App\Http\Controllers;

use App\Models\UserActivities as ModelsUserActivities;
use Illuminate\Http\Request;

class userActivities extends Controller
{
    // public function showUserAcivities($id)
    // {
    //     $userData = ModelsUserActivities::where('user_id',  $id)->paginate(10);
    //     return view('livewire.admin.user-activities', compact('userData'));
    // }
}

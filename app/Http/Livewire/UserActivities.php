<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserActivities as ModelsUserActivities;
use Livewire\Component;

class UserActivities extends Component
{
    public function mount($id)
    {
        $this->userID = $id;
    }
    public function render()
    {
        $userName = User::find($this->userID);
        $userActivities = ModelsUserActivities::where('user_id', $this->userID)
                                                ->with('applicants')
                                                ->latest()
                                                ->paginate(5);
        return view('livewire.admin.user-activities',[
            'userDataActivity' => $userActivities,
            'userData' => $userName
        ]);
    }
}

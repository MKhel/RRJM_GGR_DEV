<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Applicant;
Use App\Models\classes;
use App\Models\User;

class Dashboard extends Component
{   
    public $applicant = [];
    public function mount() 
    {
        
    }
    public function render()
    {
        $applicant = Applicant::all();
        $class = classes::all();
        $Deployed = Applicant::where('status', 'like', "Deployed");
        $user = User::All();
        
        return view('livewire.dashboard', [
            'app_count' => $applicant,
            'class_count' => $class,
            'deployed_count' => $Deployed,
            'user_count' => $user
        ]);
    }
}

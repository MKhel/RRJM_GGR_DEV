<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
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
        $post = Announcement::with('user')->get();
        //$applicant = Applicant::where('id', 'LIKE',$id)->with('useractivities')->get();
        
        return view('livewire.dashboard', [
            'app_count' => $applicant,
            'class_count' => $class,
            'deployed_count' => $Deployed,
            'user_count' => $user,
            'posts' => $post,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Applicant as LivewireApplicant;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\UserActivities;

class ApplicantInfo extends Component
{   
    public $ViewApplicant;
    public $app_data;
    public $useractivity;
    public $user_activity;

    protected $rules = [
        'app_data.remarks' => 'required|unique:users,remarks',
    ];
    public function mount($id)
    {
        $this->app_data = Applicant::find($id);
        //$this->user_activity = UserActivities::where('applicant_id', $id)->paginate(5);
        
        
    }
    public function render()
    {   

        $applicant = UserActivities::where('applicant_id', $this->app_data->id)->paginate(5);

        return view('livewire.applicant-info', [
            'applicants' => $applicant,
        ]);
        //return view('livewire.applicant-info');
    }

    public function saveUserActivity($id)
    {
        
        $useractivity = [

            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role_id,
            'user_name' => auth()->user()->name,
            'remarks' => $this->app_data['remarks'],
            'applicant_id' => $id,
            'particular' => 'asdad'

        ];
        UserActivities::create($useractivity);
        session()->flash('message', 'Post successfully updated.');
    }
}

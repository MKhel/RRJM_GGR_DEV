<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Applicant as LivewireApplicant;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\UserActivities;
use App\Models\User;

class ApplicantInfo extends Component
{   
    public $ViewApplicant;
    public $app_data;
    public $useractivity;
    public $user_activity;
    public $stat;
    public $status;

    protected $rules = [
        'app_data.remarks' => 'required|unique:users,id',
        'app_data.particular' => 'required|unique:users,id',
    ];
    public function mount($id)
    {
        $this->app_data = Applicant::find($id);
        $this->user_activity = UserActivities::find($id);
        $this->stats = UserActivities::where('applicant_id', $id)->latest()->first('particular');
        //$this->user_activity = UserActivities::where('applicant_id', $id)->paginate(5);  
    }
    public function render()
    {   

        $applicant = UserActivities::where('applicant_id', $this->app_data->id)->latest()->paginate(5);
        //$stat = UserActivities::where('applicant_id', $this->app_data->id)->latest()->first('particular');
        //$status = UserActivities::where('applicant_id', $this->user_activity->id)->latest()->get('particular');
    
        return view('livewire.applicant-info', [
            'applicants' => $applicant,
            //'stat' => $stat
        ]);
        //return view('livewire.applicant-info');
    }

    public function saveUserActivity($id)
    {
        // $useractivity = $this->validate([
        //     'app_data.remarks' => 'required|unique:users,remarks',
        // 'app_data.particular' => 'required|unique:users,particular',
        // ]);

        //$this->validate();
        $useractivity = [

            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role_id,
            'user_name' => auth()->user()->name,
            'remarks' => $this->app_data['remarks'],
            'applicant_id' => $id,
            'particular' => $this->app_data['particular']

        ];
        UserActivities::create($useractivity);
        $app_stat = [
            'status' => $this->app_data['particular'],
        ];
        Applicant::find($id)->update($app_stat);       
        session()->flash('message', 'Status update successfully.');
    }
}

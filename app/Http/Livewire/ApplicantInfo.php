<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Applicant as LivewireApplicant;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\UserActivities;
use App\Models\User;
use App\Models\classes;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ApplicantInfo extends Component
{   
    use WithFileUploads;

    public $ViewApplicant;
    public $state = [];
    public $app_data;
    public $useractivity;
    public $user_activity;
    public $stat;
    public $status;
   
    public $applicant;
    Public $update;
    
    //For Applicant Profiles
    public $new_photo;
    public $old_photo;


    public $app_edit;


    public $first_name, $middle_name, $last_name, $abroad_address;
    public $remarks;

    public $confirmingeditApplicant = false;


    public $selectedCountry = Null;

    protected $rules = [
        'app_data.remarks' => 'required|unique:users,id',
        'app_data.particular' => 'required|unique:users,id',
        // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        // 'applicant.sn_number' => 'required|unique:Applicants,sn_number',
        // 'applicant.class_name' => ['required'],
        // 'applicant.birthdate' => 'required|unique:Applicants,birthdate',
        'first_name' => 'required|unique:Applicant,first_name',
        // 'applicant.middle_name' => 'required|unique:Applicants,middle_name',
        // 'applicant.last_name' => 'required|unique:Applicants,last_name',
        // 'applicant.contact_number' => 'required|unique:Applicants,contact_number',
        // 'applicant.email_address' => 'required|unique:Applicants,email_address',
        // 'applicant.home_address' => ['required'],
        // 'applicant.city' => ['required'],
        // 'applicant.province' => ['required'],
        // 'applicant.zip_code' => ['required'],
    ];
    
    public function mount($id)
    {
        $this->app_data = Applicant::find($id);
        $this->user_activity = UserActivities::find($id);
        $this->stats = UserActivities::where('applicant_id', $id)->latest()->first('particular');
    }
    public function render()
    {   
        $class  = classes::all();
        $applicant = UserActivities::where('applicant_id', $this->app_data->id)->latest()->paginate(5);
        //$stat = UserActivities::where('applicant_id', $this->app_data->id)->latest()->first('particular');
        //$status = UserActivities::where('applicant_id', $this->user_activity->id)->latest()->get('particular');
    
        return view('livewire.applicant-info', [
            'applicants' => $applicant,
            'class' => $class,
            
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
        //session()->flash('message', 'Status update successfully.');
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
        $this->reset(['remarks']);       
        session()->flash('message', 'Status update successfully.');
    }
    
    public function editApplicant($id)
    {

        $this->app_edit = Applicant::findOrFail($id);
        $this->old_photo = $this->app_edit->photo;
        $this->sn_number = $this->app_edit->sn_number;
        $this->class_name = $this->app_edit->class_name;
        $this->first_name = $this->app_edit->first_name;
        $this->middle_name = $this->app_edit->middle_name;
        $this->last_name = $this->app_edit->last_name;
        $this->birthdate = $this->app_edit->birthdate;
        $this->contact_number = $this->app_edit->contact_number;
        $this->home_address = $this->app_edit->home_address;
        $this->city = $this->app_edit->city;
        $this->province = $this->app_edit->province;
        $this->zip_code = $this->app_edit->zip_code;
        $this->confirmingeditApplicant = true;
    }
    public function saveEditApplicant($id)
    {   


        $photo = Applicant::findOrFail($id);
        $photo_data = "";
        $destination=public_path('storage\\'.$photo->photo);
        if ($this->new_photo) {
            Storage::disk('avatars')->delete($photo);
            $photo_data = $this->new_photo->store('avatars', 'public');
        } else {
            $photo_data = $this->old_photo;
        }

        $photo->photo = $photo_data;
        $photo->save();

        Applicant::updateOrCreate(['id' => $id], [
            'class_name' => $this->class_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'home_address' => $this->home_address,
            'city' => $this->city,
            'province' => $this->province,
            'zip_code' => $this->zip_code,
            //'abroad_address' => $this->abroad_address,
        ]);
        
        
        $this->confirmingeditApplicant = false;
        session()->flash('message', 'Update Applicant successfully.');
          
        //session()->flash('message', 'Status update successfully.');
        // $useractivity = [
        //     'user_id' => auth()->user()->id,
        //     'role_id' => auth()->user()->role_id,
        //     'user_name' => auth()->user()->name,
        //     'applicant_id' => $id,
        //     'remarks' => 'Update the status of this applicant.',
        //     'particular' => 'Update Applicant'


        // ];
        // UserActivities::create($useractivity);
        // session()->flash('message', 'New applicant successfully created.');
        // $this->confirmingApplicantAdd = false;
        // $this->isDisabled = '';
    }
    
}

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
    public $photo;
    public $applicant;
    Public $update;


    public $first_name, $middle_name, $last_name;
    public $remarks;

    public $confirmingeditApplicant = false;

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
        // Applicant::find(['id' => $id], [
        //     'first_name' => $this->first_name,
        // ]);
        // Applicant::where($id, [
        //     'first_name' => $this->first_name,
        //     'middle_name' => $this->middle_name,
        //     'last_name' => $this->last_name,
        // ]);
        //$this->user_activity = UserActivities::where('applicant_id', $id)->paginate(5);  
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

        $app_data = Applicant::findOrFail($id);
        $this->sn_number = $app_data->sn_number;
        $this->class_name = $app_data->class_name;
        $this->first_name = $app_data->first_name;
        $this->middle_name = $app_data->middle_name;
        $this->last_name = $app_data->last_name;
        $this->birthdate = $app_data->birthdate;
        $this->contact_number = $app_data->contact_number;
        $this->home_address = $app_data->home_address;
        $this->city = $app_data->city;
        $this->province = $app_data->province;
        $this->zip_code = $app_data->zip_code;
        $this->confirmingeditApplicant = true;
    }
    public function saveEditApplicant($id)
    {   

       
       // 
        // $upload = $this->validate();

        Applicant::updateOrCreate(['id' => $id], [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
        ]);
        $this->confirmingeditApplicant = false;
        session()->flash('update-success', 'Update Applicant successfully.');
        // $upload->sn_number = $this->applicant['sn_number'];
        // $upload->class_name = $this->applicant['class_name'];
        // $upload->first_name = $this->applicant['first_name'];
        // $upload->middle_name = $this->applicant['middle_name'];
        // $upload->last_name = $this->applicant['last_name'];
        // $upload->contact_number = $this->applicant['contact_number'];
        // $upload->email_address = $this->applicant['email_address'];
        // $upload->home_address = $this->applicant['home_address'];
        // $upload->city = $this->applicant['city'];
        // $upload->province = $this->applicant['province'];
        // $upload->zip_code = $this->applicant['zip_code'];
        // $upload->birthdate = $this->applicant['birthdate'];
        // $upload->status = "Encoded";
        // $upload->update();
        
        // $update = $this->validate();
        // $uploadPhoto = $this->photo->store('avatars');
        // $update = new Applicant;
        // $update->photo=$uploadPhoto;
        // Storage::disk('avatars')->delete($this->photo->avatars);
        //$this->applicant->update($update);
        // if ($this->photo)
        //     {
        //         Storage::disk('avatars')->delete($this->photo);
        //         $app_data['photo'] = $this->photo->store('avatars');
        //     }
        // $app_data = [

        //     //'class_name' => $this->applicant['class_name'],
        //     'first_name' => $this->applicant['first_name'],
        //     'middle_name' => $this->applicant['middle_name'],
        //     'last_name' => $this->applicant['last_name'],
        //     'contact_number' => $this->applicant['contact_number'],
        //     //'email_address' => $this->applicant['email_address'],
        //     'home_address' => $this->applicant['home_address'],
        //     'city' => $this->applicant['city'],
        //     'province' => $this->applicant['province'],
        //     'zip_code' => $this->applicant['zip_code'],
        //     //'birthdate' => $this->applicant['birthdate'],
        //     'status'   => "Encoded",
        // ];

        // Applicant::find($id)->update($app_data);
        // $this->confirmingeditApplicant = false;


        // Applicant::find($id)->update($app_data);       
        session()->flash('message', 'Status update successfully.');
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

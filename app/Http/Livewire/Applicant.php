<?php

namespace App\Http\Livewire;

use App\Models\Adminpanel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Applicant as Applicants;
Use App\Models\classes;
use Livewire\WithFileUploads;
use App\Models\UserActivities;
use App\Notifications\addApplicantNotif;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\This;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;
use Illuminate\Notifications\Notification;





class Applicant extends Component
{   
    use WithPagination;
    use WithFileUploads;

    public $applicant;
   

    public $confirmingApplicantDeletion = false;
    public $confirmingApplicantAdd = false;
    public $confirmingeditApplicant = false;

    public $confirmClosesave;
    public $confirmCloseupdate;




    
    public $search = '';
    
    public $orderAsc = true;
    public $photo;
    
    public $allApplicants;
    public $LinedUpApp;
    public $InterviewApplicants;
    public $class_name;
    public $classses;
    public $store;
    public $closeForm;

    //For  by Search
    public $perPage = '';
    public $searchQuery = '';
    public $perClass = '';
    public $perStatus = '';

    public $new_photo;
    public $old_photo;

    //For  sort by asc and desc
    public $sortColumn = 'created_at';
    public $sortDirection = 'desc';


    public $abroad_address;
    public $countries;
    public $states;
    public $cities;

    public $selectedCountry = Null;
    public $selectedState = Null;


    public $user;
    public $user_data;
    public $app_id;

    public $searchQ;


    public $isDisabled = '';


    public $new_status;
    //public $notDisabled = '';

    
    

    protected $rules = [
        'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        'applicant.sn_number' => 'required',
        'applicant.class_name' => 'required',
        'applicant.birthdate' => 'required',
        'applicant.first_name' => 'required',
        'applicant.middle_name' => 'required',
        'applicant.last_name' => 'required',
        'applicant.suffix' => '',
        'applicant.contact_number' => 'required',
        'applicant.email_address' => 'required|unique:Applicants,email_address',
        'applicant.home_address' => '',
        'applicant.city' => '',
        'applicant.province' => '',
        'applicant.country' => '',
        'applicant.zip_code' => '',
        
    ];
    // protected $rules = [
    //     'applicant' => ['required'],
    //     'user_id'  => ['required', 'unique:tags,name', 'min:5', 'max:10'],
    // ];

    // public function mount() 
    // {
    //     $this->app_id = User::with('applicant')->get()->dd();
    //     //$this->app_id = Applicants::with('useractivities')->get()->dd();
    // }
    public function mount()
    {
        $this->countries = Country::all();
        $this->states = collect();
        //$this->cities - collect();
        
        $this->new_status = Adminpanel::all();
    }
    
    public function render()
    {   

        $user_id =  User::all();
        $class  = classes::all();

        $perPage = $this->perPage;


        return view('livewire.applicant.show', [
            'user_id' => $user_id,
            'class' => $class,
                                        
            'applicants' => Applicants::query()
                                        ->when($this->perClass, function($query) {
                                            return $query->where('class_name', $this->perClass);
                                        })
                                        ->when($this->perStatus, function($query) {
                                            return $query->where('status', $this->perStatus);
                                        })
                                        ->when($this->searchQuery, function($query) {
                                            return $query->where('sn_number', 'LIKE', '%'. $this->searchQuery . '%')
                                                        ->orwhere('class_name', 'LIKE', '%'. $this->searchQuery . '%')
                                                        ->orwhere('first_name', 'LIKE', '%'. $this->searchQuery . '%')
                                                        ->orwhere('middle_name', 'LIKE', '%'. $this->searchQuery . '%')
                                                        ->orwhere('last_name', 'LIKE', '%'. $this->searchQuery . '%')
                                                        ->orwhere('status', 'LIKE', '%'. $this->searchQuery . '%');
                                        })
                                        ->orderBy($this->sortColumn, $this->sortDirection)
                                        ->latest()
                                        ->paginate($perPage)
        ]);
      
    }
    public function sortByClassname()
    {
        return Applicants::query()
        ->when($this->OrderbyClassName, function($query) {
            return $query->where('class_name', $this->OrderbyClassName);
        });
    }   
    public function updatedselectedCountry($country)
    {
        //$state = State::where('country_id', $country)->get()->dd();
        $this->states = State::where('country_id', $country)->get();
        $this->selectedState = Null;
    }
    // public function updatedSelectedState($state)
    // {
    //     if (!is_null($state)) {
    //         $this->cities = City::where('state_id'. $state)->get();
    //     }
    // }
    

    public function confirmApplicantAdd()
    {   
        //$this->reset(['applicant']);
        $this->isDisabled = 'Disabled';
        // //$this->reset(['photo']);
        $this->confirmingApplicantAdd = true;
         
    }
    public function sortBy($columnName)
    {
        if ($this->sortColumn === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        
        
        $this->sortColumn = $columnName;
    }
    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    public function confirmClosesave()
    {   
        $this->isDisabled = '';
        $this->confirmingApplicantAdd = false;
         
    }
    public function confirmCloseupdate()
    {   
        $this->isDisabled = '';
        $this->confirmingeditApplicant= false;
         
    }
    public function confirmClosedelete()
    {   
        $this->isDisabled = '';
        $this->confirmingApplicantDeletion= false;
         
    }

    public function editApplicant($id)
    {

        $this->app_edit = Applicants::findOrFail($id);
        $this->app_id = $id;
        $this->old_photo = $this->app_edit->photo;
        $this->sn_number = $this->app_edit->sn_number;
        $this->class_name = $this->app_edit->class_name;
        $this->first_name = $this->app_edit->first_name;
        $this->middle_name = $this->app_edit->middle_name;
        $this->last_name = $this->app_edit->last_name;
        $this->suffix = $this->app_edit->suffix;
        $this->birthdate = $this->app_edit->birthdate;
        $this->email_address = $this->app_edit->email_address;
        $this->contact_number = $this->app_edit->contact_number;
        $this->home_address = $this->app_edit->home_address;
        $this->abroad_address = $this->app_edit->abroad_address;
        $this->city = $this->app_edit->city;
        $this->province = $this->app_edit->province;
        $this->zip_code = $this->app_edit->zip_code;
        $this->confirmingeditApplicant = true;
    }
    public function saveEditApplicant($id)
    {   


        $applicant = Applicants::findOrFail($id);
        $photo = Applicants::findOrFail($id);
        $photo_data = "";
        $destination=public_path('storage\\'.$photo->photo);
        if ($this->new_photo) {
            Storage::disk('avatars')->delete($photo);
            //$photo_data = $this->new_photo->store('avatars', 'public');
            $first_name = $applicant->first_name;
            $last_name = $applicant->last_name;
            $middle_name = $applicant->middle_name;
            $photo_data = $this->new_photo->storeAs('avatars', ("$first_name $middle_name $last_name"));
        } else {
            $photo_data = $this->old_photo;
        }

        $photo->photo = $photo_data;
        $photo->save();

        Applicants::updateOrCreate(['id' => $id], [
            'class_name' => $this->class_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix ?? "None",
            'contact_number' => $this->contact_number,
            'birthdate' => $this->birthdate,
            'home_address' => $this->home_address,
            'city' => $this->city,
            'province' => $this->province,
            'zip_code' => $this->zip_code,
            'abroad_address' => $this->abroad_address ?? "None",
            //'abroad_address' => $this->abroad_address,
        ]);
        
        
        $this->confirmingeditApplicant = false;
        // $thread->addApplicant($request->body);
       
        session()->flash('message', 'Applicant updated successfully.');


        $useractivity = [
            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role_id,
            'user_name' => auth()->user()->name,
            'applicant_id' => $id,
            'remarks' => 'Update the status of this applicant',
            'particular' => 'Update Applicant'


        ];
        UserActivities::create($useractivity);
        $this->confirmingeditApplicant = false;
        session()->flash('message', 'Update Applicant successfully.');
          
    }

    public function saveApplicant()
    {   
        
        $upload = $this->validate();
        $first_name = $this->applicant['first_name'];
        $last_name = $this->applicant['last_name'];
        $middle_name = $this->applicant['middle_name'];
        $uploadPhoto = $this->photo->storeAs('avatars', ("$first_name $middle_name $last_name"));
        $upload = new Applicants;
        $upload->photo=$uploadPhoto;
        $upload->user_id = auth()->id();
        $upload->sn_number = $this->applicant['sn_number'];
        $upload->class_name = $this->applicant['class_name'];
        $upload->first_name = $this->applicant['first_name'];
        $upload->middle_name = $this->applicant['middle_name'];
        $upload->last_name = $this->applicant['last_name'];
        $upload->suffix = $this->applicant['suffix'] ?? "None";
        $upload->contact_number = $this->applicant['contact_number'];
        $upload->email_address = $this->applicant['email_address'];
        $upload->home_address = $this->applicant['home_address'];
        $upload->city = $this->applicant['city'];
        $upload->province = $this->applicant['province'];
        $upload->country = "Philippines";
        $upload->zip_code = $this->applicant['zip_code'];
        $upload->birthdate = $this->applicant['birthdate'];
        $upload->abroad_address = $this->applicant['abroad_address'] ?? "None";
        $upload->status = "Encoded";
        // $upload->upload = [
        //     'user_id' => auth()->id(),
        //     'sn_number' => $this->applicant['sn_number'],
        //     //'photo' => $this->photo['photo'],
        //     //'photo' => $this->photo['photo']->store('avatars', 'public'),
        //     //'photo' => $this->applicant->file('public', 'avatars')->photo['photo'],
        //     //'photo' => $photo,
        //     'class_name' => $this->applicant['class_name'],
        //     'first_name' => $this->applicant['first_name'],
        //     'middle_name' => $this->applicant['middle_name'],
        //     'last_name' => $this->applicant['last_name'],
        //     'contact_number' => $this->applicant['contact_number'],
        //     'email_address' => $this->applicant['email_address'],
        //     'home_address' => $this->applicant['home_address'],
        //     'city' => $this->applicant['city'],
        //     'province' => $this->applicant['province'],
        //     'zip_code' => $this->applicant['zip_code'],
        //     'birthdate' => $this->applicant['birthdate'],
        //     'status'   => "Encoded",
        // ];
        $upload->save();

        $this->app_id = Applicants::where('user_id', auth()->user()->id)->latest()->first('id');

        $useractivity = [
            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role_id,
            'user_name' => auth()->user()->name,
            'applicant_id' => $this->app_id->id,
            'remarks' => 'New Applicant',
            'particular' => 'Encoded'

        ];
        UserActivities::create($useractivity);

        $this->user_data = Applicants::where('id', $this->app_id->id)->latest()->first(['first_name', 'last_name']);
        
        $user = User::where('role_id',1)->first();
        $action = "added ".$this->user_data->first_name.",".$this->user_data->last_name." as new applicant. ";
        $user->notify(new addApplicantNotif($user, $action));
        session()->flash('message', 'New applicant successfully created.');
        $this->confirmingApplicantAdd = false;
        $this->isDisabled = '';
        $this->reset(['applicant']);
        

    }
    public function markasread($id)
    {
        if($id)
        {
            auth()->user()->unreadNotifications->where('id',$id)->markasread();
        }
        return back();


        //dd($id);
    }

    public function confirmApplicantDelete($id)
    {  
        $this->isDisabled = '';
        $this->confirmingApplicantDeletion = $id;
    }

    public function DeleteApplicant($id)
    {   
        //$applicant->delete();
        Applicants::where('id',$id)->delete();
        UserActivities::where('applicant_id',"$id")->delete();
        $this->user_data = Applicants::where('id', $id)->latest()->first(['first_name', 'last_name']);
        $user = auth()->user();
        $action = "Deleted an applicant. ";
        $user->notify(new addApplicantNotif($user, $action));
        $this->confirmingApplicantDeletion = false;
        session()->flash('delete', 'Delete Applicant successfully.');
    }
   
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Applicant as Applicants;
Use App\Models\classes;
use Livewire\WithFileUploads;
use App\Models\UserActivities;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Storage;


class Applicant extends Component
{   
    use WithPagination;
    use WithFileUploads;

    public $applicant;
   

    public $confirmingApplicantDeletion = false;
    public $confirmingApplicantAdd = false;

    
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
    public $className = '';
    public $orderBy = '';
    public $perPage = '';
    public $searchQuery = '';


    public $user;
    public $user_data;
    public $app_id;

    public $searchQ;

    public $isDisabled = '';
    //public $notDisabled = '';

    
    

    protected $rules = [
        'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        'applicant.sn_number' => 'required|unique:Applicants,sn_number',
        'applicant.class_name' => ['required'],
        'applicant.birthdate' => 'required|unique:Applicants,birthdate',
        'applicant.first_name' => 'required|unique:Applicants,first_name',
        'applicant.middle_name' => 'required|unique:Applicants,middle_name',
        'applicant.last_name' => 'required|unique:Applicants,last_name',
        'applicant.suffix' => '',
        'applicant.contact_number' => 'required|unique:Applicants,contact_number',
        'applicant.email_address' => 'required|unique:Applicants,email_address',
        'applicant.home_address' => ['required'],
        'applicant.city' => ['required'],
        'applicant.province' => ['required'],
        'applicant.zip_code' => ['required'],
        
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
    
    public function render()
    {   
        //$applicants = User::all();
        // $applicants = Applicants::paginate(5);
        
        $user_id =  User::all();
        $class  = classes::all();
        
        if ($this->searchQuery != null)
        $searchQuery = '%'. $this->searchQuery . '%';
        elseif ($this->searchQuery != null)
        $searchQuery = '%'. $this->orderBy . '%';
        else
        $searchQuery = '%'. $this->className . '%';
        
        $perPage  = $this->perPage;
        $sortBy = $this->orderBy;
        //$app_id = Applicants::where('user_id', auth()->user()->id)->get('id')->dd();
        
        //$app_id = Applicants::where(auth()->user()->id, 'user_id' )->where('applicant_id')->dd();
        //$status = Applicants::with('useractivities')->get()->dd();
        //$app_id = User::with('applicant')->get()->dd();
                  
        return view('livewire.applicants', [
            //'applicants' => $applicants,
            'user_id' => $user_id,
            'class' => $class,
            // 'applicants' => Applicants::when($this->searchQuery, function($query, $searchQuery){
            //     return $query->where('sn_number', 'LIKE', "%$searchQuery%")
            //                  ->orWhere('class_name', 'LIKE', "%$searchQuery%");
            //     })->latest()->orderBy('status', "desc", $this->orderBy)->paginate($this->perPage),
            
            'applicants' => Applicants::where('sn_number', 'LIKE', $searchQuery)
                                        ->orwhere('class_name', 'LIKE', $searchQuery)
                                        //->orwhere('status', 'LIKE', $searchOrder)
                                        ->orwhere('first_name', 'LIKE', $searchQuery)
                                        ->orwhere('middle_name', 'LIKE', $searchQuery)
                                        ->orwhere('last_name', 'LIKE', $searchQuery)
                                        ->orwhere('status', 'LIKE', $searchQuery)
                                        //->sortby('status', $sortBy)
                                        ->latest()
                                        //->orderBy('status')
                                        //->so('status', 'asc', $sortBy)
                                        ->paginate($perPage),

            // 'applicants' => Applicants::when($this->orderBy, function($query, $searchQ){
            //         return $query->where('status', 'LIKE', "%$searchQ%");
            //         })->latest()->paginate($this->perPage),
        
            //'applicants' => Applicants::where('sn_number', $this->searchQuery)->paginate(10)
            // 'applicants' => Applicants::query()
            // ->when($this->searchQuery, function($query, $searchQuery){ $query->where('sn_number', 'LIKE', %.$searchQuery.%");})
            // ->latest()->paginate(5)
            // // 'applicants' => Applicants::where('sn_number', "$this->searchQuery")->paginate(5)
        ]);

    
            
      
    }
    

    public function confirmApplicantAdd()
    {   
        $this->reset(['applicant']);
        // //$this->reset(['photo']);
        $this->isDisabled = 'disabled';
        $this->confirmingApplicantAdd = true;
        if ($this->confirmingApplicantAdd = true) {
            $this->isDisabled = 'disabled';
        } else {
            $this->confirmingApplicantAdd = false;
            $this->isDisabled = '';
        }
        $this->confirmingApplicantAdd = true;
        
       
        
    }
    // public function closeForm()
    // {
    //     $this->isDisabled = '';
    //     $this->closeForm = true;
    // }

    // public function upload()
    // {
    //     // $this->validate([
    //     //     //'photo' => 'image|max:1024', // 1MB Max
    //     //     //'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     // ]);
    //     $app_data['photo'] = $this->photo['photo']->store('avatars', 'public');
    //     //$this->photo->store('/public', 'avatars');
    // }


    public function saveApplicant()
    {   
        $upload = $this->validate();

        $uploadPhoto = $this->photo->store('avatars');
        $upload = new Applicants;
        $upload->photo=$uploadPhoto;
        $upload->user_id = auth()->id();
        $upload->sn_number = $this->applicant['sn_number'];
        $upload->class_name = $this->applicant['class_name'];
        $upload->first_name = $this->applicant['first_name'];
        $upload->middle_name = $this->applicant['middle_name'];
        $upload->last_name = $this->applicant['last_name'];
        $upload->last_name = $this->applicant['suffix'];
        $upload->contact_number = $this->applicant['contact_number'];
        $upload->email_address = $this->applicant['email_address'];
        $upload->home_address = $this->applicant['home_address'];
        $upload->city = $this->applicant['city'];
        $upload->province = $this->applicant['province'];
        $upload->zip_code = $this->applicant['zip_code'];
        $upload->birthdate = $this->applicant['birthdate'];
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
        session()->flash('message', 'New applicant successfully created.');
        $this->confirmingApplicantAdd = false;
        $this->isDisabled = '';
        $this->reset(['applicant']);

    }

    public function confirmApplicantDelete($id)
    {  
        $this->isDisabled = '';
        $this->confirmingApplicantDeletion = $id;
    }

    public function DeleteApplicant( Applicants $applicant)
    {   
        $applicant->delete();
        $this->confirmingApplicantDeletion = false;
    }
}

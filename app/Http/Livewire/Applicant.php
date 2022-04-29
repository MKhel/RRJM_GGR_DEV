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


class Applicant extends Component
{   
    use WithPagination;
    use WithFileUploads;

    public $applicant;
   

    public $confirmingApplicantDeletion = false;
    public $confirmingApplicantAdd = false;

    public $perPage = '';
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $photo;
    public $searchQuery;
    public $allApplicants;
    public $LinedUpApp;
    public $InterviewApplicants;
    public $class_name;
    public $classses;
    public $store;


    public $user;
    public $user_data;
    public $app_id;


    public $isDisabled = '';
    

    protected $rules = [
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'applicant.sn_number' => 'required|unique:Applicants,sn_number',
        'applicant.class_name' => ['required'],
        'applicant.birthdate' => 'required|unique:Applicants,birthdate',
        'applicant.first_name' => 'required|unique:Applicants,first_name',
        'applicant.middle_name' => 'required|unique:Applicants,middle_name',
        'applicant.last_name' => 'required|unique:Applicants,last_name',
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
        //$app_id = Applicants::where('user_id', auth()->user()->id)->get('id')->dd();
        
        //$app_id = Applicants::where(auth()->user()->id, 'user_id' )->where('applicant_id')->dd();
        //$status = Applicants::with('useractivities')->get()->dd();
        //$app_id = User::with('applicant')->get()->dd();
                  
        return view('livewire.applicants', [
            //'applicants' => $applicants,
            'user_id' => $user_id,
            'class' => $class,
            'applicants' => Applicants::when($this->searchQuery, function($query, $searchQuery){
                return $query->where('sn_number', 'LIKE', "%$searchQuery%");
                })->latest()->orderBy('status', "asc", $this->orderBy)->paginate($this->perPage),
        

        
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
        $this->reset(['photo']);
        //$this->user_id = $user_id;
        $this->isDisabled = 'disabled';
        $this->confirmingApplicantAdd = true;
    }


    public function saveApplicant()
    {   
        // $validatedData = $this->validate([
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $app_data = $this->validate();
        // $app_data = $this->validate([
        // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        // $this->validate([
        //     'photo' => 'required|mimes:jpg,png,jpeg|max:5048'
        // ]);
        // $files = file('photo');
        // $fileName = time().'.'.$files->extension();
        // $files->move(public_path('images'),$fileName);
       
        $app_data = [
            'user_id' => auth()->id(),
            'sn_number' => $this->applicant['sn_number'],
            //'photo' => $this->applicant['photo'],
            //'photo' => '',
            'class_name' => $this->applicant['class_name'],
            'first_name' => $this->applicant['first_name'],
            'middle_name' => $this->applicant['middle_name'],
            'last_name' => $this->applicant['last_name'],
            'contact_number' => $this->applicant['contact_number'],
            'email_address' => $this->applicant['email_address'],
            'home_address' => $this->applicant['home_address'],
            'city' => $this->applicant['city'],
            'province' => $this->applicant['province'],
            'zip_code' => $this->applicant['zip_code'],
            'birthdate' => $this->applicant['birthdate'],
            'status'   => "Encoded",
        ];

        if ($this->photo) {
            $app_data['photo'] = $this->photo->store('/public', 'avatars');
        }

        Applicants::create($app_data);
        //$this->app_id = User::with('applicant')->get();
        $this->app_id = Applicants::where('user_id', auth()->user()->id)->get('id');
        //$this->app_id = Applicants::get()->latest()->first('id')->dd();

        
        $useractivity = [
            'user_id' => auth()->user()->id,
            'role_id' => auth()->user()->role_id,
            'user_name' => auth()->user()->name,
            'applicant_id' => $this->app_id,
            'remarks' => 'New Applicant',
            'particular' => 'Encoded'


        ];
        UserActivities::create($useractivity);
        session()->flash('message', 'New applicant successfully created.');
        $this->confirmingApplicantAdd = false;
        // $this->isDisabled = '';
        // return $this->saveUseActiviy();

    }
    // public function saveUseActiviy()
    // {

        // $useractivity = [
        //     'particular' => auth()->user()->role_id,
        //     'user_name' => auth()->user()->name,
        //     'remarks' => 'New Applicant Encoded',
        //     'applicant_id' => $this->applicant->user_id,

        // ];
        // UserActivities::create($useractivity);
    // }

    public function confirmApplicantDelete($id)
    {  
        $this->confirmingApplicantDeletion = $id;
    }

    public function DeleteApplicant( Applicants $applicant)
    {   
        $applicant->delete();
        $this->confirmingApplicantDeletion = true;
    }

    // public function viewApplicant($id)
    // {  
    //     $applicants->app_data = Applicants::get()->where('id', "$id");
    //     return redirect()->to('applicantinfo');
    // }
}

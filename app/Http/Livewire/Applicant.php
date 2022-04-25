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
    public $LinedUpApplicants;
    public $InterviewApplicants;
    public $class_name;
    public $classses;
    public $store;


    public $user;
    
    // protected $rules = [
    //     'applicant' => ['required'],
    //     'user_id'  => ['required', 'unique:tags,name', 'min:5', 'max:10'],
    // ];

    // public function mount() 
    // {
    //     $this->class = classes::get()
    // }
    public function render()
    {   
        //$applicants = User::all();
        // $applicants = Applicants::paginate(5);
        $user_id =  User::all();
        $class  = classes::get();
                  
        return view('livewire.applicants', [
            //'applicants' => $applicants,
            'user_id' => $user_id,
            'class' => $class,
            'applicants' => Applicants::when($this->searchQuery, function($query, $searchQuery){
                return $query->where('sn_number', 'LIKE', "%$searchQuery%" );
                })->paginate(5)

            //'applicants' => Applicants::where('sn_number', "$this->searchQuery")->paginate(5),
        ]);
            
      
    }


    public function confirmApplicantAdd()
    {   
        $this->reset(['applicant']);
        //$this->user_id = $user_id;
        $this->confirmingApplicantAdd = true;
    }


    public function saveApplicant()
    {   
        // $validatedData = $this->validate([
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        
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
            //'user_id' => $this->applicant['user_id'],
            'sn_number' => $this->applicant['sn_number'],
            //'photo' => $this->applicant['photo'],
            'photo' => '',
           // $photo ['photo'] = $this->applicant->store('photo', 'storage'),
            'class_name' => $this->applicant['class_name'],
            //'class_name' => 'Asklepios',
            'first_name' => $this->applicant['first_name'],
            'middle_name' => $this->applicant['middle_name'],
            'last_name' => $this->applicant['last_name'],
            'contact_number' => $this->applicant['contact_number'],
            'email_address' => $this->applicant['email_address'],
            'home_address' => $this->applicant['home_address'],
            'city' => $this->applicant['city'],
            'province' => $this->applicant['province'],
            'zip_code' => $this->applicant['zip_code'],
        ];


        Applicants::create($app_data);

        
        $useractivity = [
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'remarks' => 'New Applicant Encoded',
            'applicant_id' => auth()->user()->id,
            'particular' => 'asdad'

            

        ];
        UserActivities::create($useractivity);
        session()->flash('message', 'Post successfully updated.');
        $this->confirmingApplicantAdd = false;
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
        $this->confirmingApplicantDeletion = false;
    }

    // public function viewApplicant($id)
    // {  
    //     $applicants->app_data = Applicants::get()->where('id', "$id");
    //     return redirect()->to('applicantinfo');
    // }
}

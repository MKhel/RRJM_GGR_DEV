<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Applicant as LivewireApplicant;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\classes as client;
use App\Models\Applicant;
use App\Models\classes as ModelsClasses;
use App\Models\User;
use App\Models\UserActivities;
use Illuminate\Console\Application;

class Classes extends Component
{
    use WithPagination;

    public $Classes;
    public $class_name;
    public $confirmClassDelete;

    public $confirmingClassDeletion = false;
    public $confirmingClassAdd = false;
    public $confirmingClassUpdate = false;

    public $searchQuery;

    public $class_id;
    public $viewApplicant = false;

    public $client_id;
    public $classes_name, $target_number;

    public $showEditModal = false;

    protected $rules = [
        'Classes.class_name' => 'required|unique:classes,class_name',
        'Classes.target_number' => ['required'],
        'Classes.start_class' => ['required'],
    ];

    // public function mount($id)
    // {
    //     $this->class_data = client::find($id);
    // }
    public function render()
    {   
        
        
        //$applicant_count =  Applicant::where('status', "LIKE","Encoded")->withcount('a');
       // $applicant_count = client::withcount('applicant')->get();
        //return "$applicant_count";
        return view('livewire.classes', [
                
                'clients' => client::when($this->searchQuery, function($query, $searchQuery){
                    return $query->where('class_name', 'LIKE', "%$searchQuery%" );
                    })->latest()->withcount('applicant')->paginate(5),
               // 'app_count' => $applicant_count
                //'app_count' => Applicant::where('id')->withCount()
        ]);

        
    }
    public function confirmClassAdd()
    {   
        //$this->reset(['Classes']);
        $this->confirmingClassAdd = true;
    }
    public function saveClass()
    {   

        $app_data = $this->validate();

        $app_data = [
            'class_name' => $this->Classes['class_name'],
            'target_number' => $this->Classes['target_number'],
            'start_class' => $this->Classes['start_class']
            
        ];
    

        client::create($app_data);
        $this->reset(['Classes']);
        session()->flash('message', 'New class successfully created.');
        $this->confirmingClassAdd = false;



    }
    
    public function confirmClassDelete($id)
    {  
        $this->confirmingClassDeletion = $id;
        $this->client_id = $id;
        $this->confirmingClassDeletion = true;
    }

    public function DeleteClass()
    {   
        Client::find($this->client_id)->delete();
        //$client->delete();
        session()->flash('delete', 'Class deleted successfully.');
        $this->confirmingClassDeletion = false;
    }
    public function confirmClassUpdate($id)
    {  
        
        $this->client = client::findOrFail($id);
        $this->client_id = $id;
        $this->class_name = $this->client->class_name;
        $this->start_class = $this->client->start_class;
        $this->target_number = $this->client->target_number;
        $this->confirmingClassUpdate = $id;
        $this->confirmingClassUpdate = true;
    }
    public function UpdateClass($id)
    {   
        // $class_data = [
        //     'class_name'  => $this->class_name,
        //     'target_number' => $this->target_number,
        //     'start_class' => $this->start_class
        // ];
        // Applicant::find($id)->update($class_data);

        Client::updateOrCreate(['id' => $id], [
            'class_name'  => $this->class_name,
            'target_number' => $this->target_number,
            'start_class' => $this->start_class
            
        ]); 
        session()->flash('message', 'Updated class successfully.');
        $this->confirmingClassUpdate = false;
    }
    public function showApplicant($id)
    {
        //return $this->class_name;
        $this->class = Client::where('id',$id)->get();
        $this->applicant = Applicant::where('class_name', "asklepios")->get();
        $this->applicants = $this->applicant;
        $this->viewApplicant = true;
    }
}



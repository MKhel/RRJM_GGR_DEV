<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Applicant as LivewireApplicant;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\classes as client;
use App\Models\Applicant;
use Illuminate\Console\Application;

class Classes extends Component
{
    use WithPagination;

    public $Classes;
    public $class_name;

    public $confirmingClassDeletion = false;
    public $confirmingClassAdd = false;

    public $searchQuery;

    protected $rules = [
        'Classes.class_name' => 'required|unique:classes,class_name',
        'Classes.target_number' => ['required'],
    ];

    public function render()
    {   
        

        //$applicant_count =  Applicant::where('status', "LIKE","Encoded")->withcount('a');
       // $applicant_count = client::withcount('applicant')->get();
        //return "$applicant_count";
        return view('livewire.classes', [
                
                'client' => client::when($this->searchQuery, function($query, $searchQuery){
                    return $query->where('class_name', 'LIKE', "%$searchQuery%" );
                    })->latest()->withcount('applicant')->paginate(5),
               // 'app_count' => $applicant_count
                //'app_count' => Applicant::where('id')->withCount()
        ]);

        
    }
    public function confirmClassAdd()
    {   
        $this->reset(['Classes']);
        $this->confirmingClassAdd = true;
    }
    public function saveClass()
    {   

        $app_data = $this->validate();

        $app_data = [
            'class_name' => $this->Classes['class_name'],
            'target_number' => $this->Classes['target_number']
            
        ];
    

        client::create($app_data);
        $this->confirmingClassAdd = false;



    }
}



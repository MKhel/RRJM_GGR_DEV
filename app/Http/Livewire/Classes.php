<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\classes as client;


class Classes extends Component
{
    use WithPagination;

    public $Classes;
    public $class_name;

    public $confirmingClassDeletion = false;
    public $confirmingClassAdd = false;

    public $searchQuery;

    public function render()
    {   
        


        return view('livewire.classes', [
                
                'client' => client::when($this->searchQuery, function($query, $searchQuery){
                    return $query->where('class_name', 'LIKE', "%$searchQuery%" );
                    })->latest()->paginate(5)
        ]);

        
    }
    public function confirmClassAdd()
    {   
        $this->reset(['Classes']);
        $this->confirmingClassAdd = true;
    }
    public function saveClass()
    {

        $app_data = [
            'class_name' => $this->Classes['class_name'],
            'target_number' => $this->Classes['target_number']
            
        ];
    

        client::create($app_data);
        $this->confirmingClassAdd = false;



    }
}



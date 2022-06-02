<?php

namespace App\Exports;

use App\Models\UserActivities as ModelsUserActivities;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserActivity implements FromView
{
    use Exportable; 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('livewire.admin.export.user-activities', [
            'userDataActivity' =>  ModelsUserActivities::all()
        ]);

    }
}

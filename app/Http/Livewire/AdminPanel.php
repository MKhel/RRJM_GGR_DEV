<?php

namespace App\Http\Livewire;

use App\Models\Adminpanel as ModelsAdminpanel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPanel extends Component
{
    use WithPagination;
    public $new_status;
    public $isEdit = false;
    public $userdeleteConfirmation = false;
    public $userRegistrationConfirmation = false;

    public $user_id;


    // user component
    public $name, $role_id, $email, $password, $confirm_password;

    protected $rules = [
        'new_status' => 'required|unique:adminpanels,new_status',

        'name' => 'required',
        'role_id' => 'required',
        'email' => 'required',
        'password' => 'required',

    ];
    public function render()
    {
        $users = User::latest()->paginate(5);
        $post = ModelsAdminpanel::latest()->paginate(5);
        return view('livewire.admin-panel', [
            'posts' => $post,
            'users' => $users,
        ]);
    }
    public function saveNewStatus()
    {
        $annouce_data = $this->validate();
        $annouce_data = [
            'user_id' => auth()->user()->id,
            'new_status' => $this->new_status,
            'user_name' => auth()->user()->name,
        ];
        ModelsAdminpanel::create($annouce_data);
        $this->reset(['new_status']);
        $this->isEdit = false;
        session()->flash('message', 'Announcement created successfully.');
    }
    public function updateNewStatus($id)
    {
        // $annouce_data = [
        //     'user_id' => auth()->user()->id,
        //     'new_status' => $this->new_status,
        //     'user_name' => auth()->user()->name,
        // ];
        // ModelsAdminpanel::create($annouce_data);

        ModelsAdminpanel::updateOrCreate(['id' => $id], [
            'user_id' => auth()->user()->id,
            'new_status' => $this->new_status,
            'user_name' => auth()->user()->name,
        ]);
        $this->reset(['new_status']);
        $this->isEdit = false;
        session()->flash('message', 'Status created successfully.');
    }
    public function deleteNewStatus($id)
    {
        ModelsAdminpanel::find($id)->delete();
        $this->reset(['new_status']);
        $this->isEdit = false;
        session()->flash('delete', 'Status deleted successfully.');
    }
    public function editStatus($id)
    {
        $this->status = ModelsAdminpanel::findOrFail($id);
        $this->status_id = $id;
        $this->new_status = $this->status->new_status;
        $this->isEdit = true;
    }
    public function deleteConfirmation($id)
    {   
        
        $this->userdeleteConfirmation = $id;
        //$this->userdeleteConfirmation = true;
        $this->user_id = $id;
    }
    public function closedeleteConfirmation()
    {
        $this->userdeleteConfirmation = false;
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        $this->reset(['new_status']);
        $this->isEdit = false;
        $this->userdeleteConfirmation = false;
        session()->flash('delete', 'User deleted successfully.');
    }

    public function openRegistration()
    {
        $this->userRegistrationConfirmation = true;
    }
    public function closeRegistration()
    {
        $user = [
            'role_id',
            'name',
            'email',
            'password',
            'confirm_password'
        ];
        $this->reset($user);
        $this->userRegistrationConfirmation = false;
    }
    public function userRegister()
    {
        $user_data = $this->validate();
        $user_data = [
            'role_id' => $this->role_id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
        $user = [
            'role_id',
            'name',
            'email',
            'password',
            'confirm_password'
        ];
        User::create($user_data);
        $this->reset($user);
        $this->isEdit = false;
        $this->userRegistrationConfirmation = true;
        session()->flash('user-message', 'Announcement created successfully.');
    }
}

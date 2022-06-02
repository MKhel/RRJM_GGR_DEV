<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use Carbon\Carbon;

class Announcements extends Component
{
    public $post;

    protected $rules = [
        'post' => 'required',
    ];
    public function render()
    {   
        $post = Announcement::where('posted_by', 'like', auth()->user()->name)->latest()->get();
        return view('livewire.announcement.show', [
            'posts' => $post,
        ]);
    }

    

    public function saveAnnouncement()
    {
        $annouce_data = $this->validate();

        $annouce_data = [
            'announcement_post' => $this->post,
            'posted_by' => auth()->user()->name,
        ];

        Announcement::create($annouce_data);
        $this->reset(['post']);
        session()->flash('message', 'Announcement created successfully.');
    }
    public function deleteAnnouncement($id)
    {
        Announcement::find($id)->delete();
        session()->flash('delete', 'Announcement deleted successfully.');
    }
}

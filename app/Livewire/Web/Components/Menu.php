<?php

namespace App\Livewire\Web\Components;

use App\Models\CategoryRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public $userChatRooms;

    public function mount()
    {
        $this->loadRooms();
        if (Auth::check()) {
            $this->loadUserRooms();
        }
    }

    public function loadRooms()
    {
        $this->categories = CategoryRoom::with(['chatRoom:id,category_room_id,users'])->get();
    }

    public function loadUserRooms()
    {
        $this->userChatRooms = Auth::user()->chatRooms()->with('category')->get();
    }

    public function render()
    {
        return view('livewire.web.components.menu');
    }
}

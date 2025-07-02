<?php

namespace App\Livewire\Web\Chat;

use App\Models\ChatRoom;
use Livewire\Component;

class OnlineUsers extends Component
{
    public $chatRoom; // A sala de chat atual
    public $onlineUsers = []; // Propriedade para armazenar os usuários online
    public $totalOnline = 0; // Para o contador

    protected $listeners = [
        'echo:chatroom.users.{chatRoom.id},updated' => 'refreshUsersList'
    ];

    public function mount(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
        $this->loadUsersFromPivot();
    }

    public function loadUsersFromPivot()
    {        

        $this->onlineUsers = $this->chatRoom->usersList()
            ->select('users.id', 'users.name')
            ->get()
            ->sortBy('name')
            ->all();

        $this->totalOnline = count($this->onlineUsers);
    }

    public function refreshUsersList()
    {
        $this->loadUsersFromPivot();
    }

    public function render()
    {
        return view('livewire.web.chat.online-users');
    }
}

<?php

namespace App\Livewire\Web\Chat;

use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{

    public ChatRoom $chatRoom;
    public $messages;
    public $entryTime;

    protected $listeners = ['novaMensagem' => 'atualizarMensagens', 'messageSentLocally' => 'atualizarMensagens'];

    public function mount(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;

        $user = Auth::user();
        if ($user) {
            $pivotData = $user->chatRooms()
                ->where('chat_rooms.id', $this->chatRoom->id)
                ->first()?->pivot;

            if ($pivotData) {
                $this->entryTime = $pivotData->entered_room;
            }
        }

        $this->messages = $this->chatRoom->messages()
            ->where('send_at', '>=', $this->entryTime)
            ->with('user')
            ->get();
    }


    public function atualizarMensagens()
    {
        $this->messages = $this->chatRoom->messages()
            ->where('send_at', '>=', $this->entryTime)
            ->with('user')
            ->get();
    }

    public function render()
    {
        return view('livewire.web.chat.chat-box');
    }
}

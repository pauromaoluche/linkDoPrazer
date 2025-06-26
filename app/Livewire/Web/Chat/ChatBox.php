<?php

namespace App\Livewire\Web\Chat;

use App\Models\ChatRoom;
use Livewire\Component;

class ChatBox extends Component
{

    public ChatRoom $chatRoom;
    public $messages;

     protected $listeners = ['novaMensagem' => 'atualizarMensagens', 'messageSentLocally' => 'atualizarMensagens'];

    public function mount(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
        $this->messages = $chatRoom->messages()->with('user')->get();
    }

    public function atualizarMensagens()
    {
        $this->messages = $this->chatRoom->messages()->with('user')->get();

        //$this->dispatch('scrollChatToBottom');
    }

    public function render()
    {
        return view('livewire.web.chat.chat-box');
    }
}

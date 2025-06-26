<?php

namespace App\Livewire\Web\Chat;

use App\Events\MessageSent;
use App\Models\ChatRoom;
use App\Models\Message;
use Livewire\Component;

class InputChat extends Component
{
    public string $message = '';
    public int $chatRoomId;

    public function mount(int $chatRoomId) 
    {
        $this->chatRoomId = $chatRoomId;
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required|string|max:1000',
        ]);

        $msg = Message::create([
            'message' => $this->message,
            'send_at' => now(),
            'user_id' => auth()->id(),
            'chat_room_id' => $this->chatRoomId,
        ]);
        
        broadcast(new MessageSent(auth()->user(), $msg))->toOthers();

        $this->message = '';

         $this->dispatch('messageSentLocally');
    }

    public function render()
    {
        return view('livewire.web.chat.input-chat');
    }
}

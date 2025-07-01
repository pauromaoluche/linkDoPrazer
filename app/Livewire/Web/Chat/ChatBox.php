<?php

namespace App\Livewire\Web\Chat;

use App\Models\ChatRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Collection;

class ChatBox extends Component
{
    public ChatRoom $chatRoom;
    public $messages;
    public $userEntryTime;

    protected $listeners = [
        'novaMensagem' => 'atualizarMensagensParaRemetente',
        'messageSentLocally' => 'atualizarMensagensParaRemetente',
        'novaMensagemViaWs' => 'addMessageFromWebsocket',
    ];

    public function mount(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;

        $user = Auth::user();
        if ($user) {
            $pivot = $user->chatRooms()
                ->where('chat_rooms.id', $this->chatRoom->id)
                ->first()?->pivot;

            $this->userEntryTime = $pivot->entered_room;
        }

        $this->loadMessages();
    }

    protected function loadMessages()
    {
        // Garante que sempre seja uma Collection desde o início
        $this->messages = collect(
            $this->chatRoom->messages()
                ->with('user')
                ->where('send_at', '>=', $this->userEntryTime)
                ->get()
        );
    }

    public function atualizarMensagensParaRemetente()
    {
        $this->loadMessages();
    }

    public function addMessageFromWebsocket($user, $message)
    {
        // Garante que $this->messages seja uma Collection válida
        // if (! $this->messages instanceof Collection) {
        //     $this->messages = collect($this->messages);
        // }

        $newMessage = (object)[
            'id' => $message['id'],
            'message' => $message['message'],
            'user_id' => $user['id'],
            'user' => (object)[
                'id' => $user['id'],
                'name' => $user['name'],
            ],
            'send_at' => isset($message['send_at']) ? Carbon::parse($message['send_at']) : Carbon::now(),
            'media_path' => $messageData['media_path'] ?? null,
            'media_type' => $messageData['media_type'] ?? null,
        ];

        // Ignora mensagens antigas
        if ($newMessage->send_at->lt($this->userEntryTime)) {
            return;
        }

        // Evita mensagens duplicadas
        if ($this->messages->contains('id', $newMessage->id)) {
            return;
        }

        // Adiciona a nova mensagem à Collection
        $this->messages->push($newMessage);
    }

    public function render()
    {
        return view('livewire.web.chat.chat-box');
    }
}

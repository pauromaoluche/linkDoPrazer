<?php

namespace App\Livewire\Web\Chat;

use App\Events\MessageSent;
use App\Models\ChatRoom;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class InputChat extends Component
{
    use WithFileUploads;
    public string $message = '';
    public int $chatRoomId;
    public $mediaFile;

    protected $messages = [
        'mediaFile.mimes' => 'O arquivo deve ser uma imagem (jpg, jpeg, png, gif) ou áudio (mp3, wav, ogg).',
        'mediaFile.max' => 'O arquivo não pode ter mais de 10MB.',
    ];

    protected function rules()
    {
        return [
            'message' => 'nullable|string|max:1000',
            'mediaFile' => [
                'nullable',
                File::types(['jpg', 'jpeg', 'png', 'gif', 'mp3', 'wav', 'ogg'])
                    ->max(20 * 1024),
            ],
        ];
    }

    public function mount(int $chatRoomId)
    {
        $this->chatRoomId = $chatRoomId;
    }

    public function sendMessage()
    {
        $this->validate();

        if (empty($this->message) && empty($this->mediaFile)) {
            $this->addError('message', 'A mensagem não pode ser vazia e nenhum arquivo foi anexado.');
            return;
        }

        $mediaPath = null;
        $mediaType = null;

        if ($this->mediaFile) {
            $room = ChatRoom::with('category_room')->findOrFail($this->chatRoomId);

            $categoryName = Str::slug($room->category_room->name);
            $path = "$categoryName/{$room->id}";

            $fullMimeType = $this->mediaFile->getMimeType();
            $mediaType = explode('/', $fullMimeType)[0];

            $mediaPath = $this->mediaFile->store("chat-media/$path", 'public');
        }

        $msg = Message::create([
            'message' => $this->message,
            'send_at' => now(),
            'user_id' => auth()->id(),
            'chat_room_id' => $this->chatRoomId,
            'media_path' => $mediaPath,
            'media_type' => $mediaType,
        ]);

        broadcast(new MessageSent(auth()->user(), $msg))->toOthers();

        $this->message = '';
        $this->mediaFile = null;

        $this->dispatch('messageSentLocally');
    }

    public function render()
    {
        return view('livewire.web.chat.input-chat');
    }
}

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

    // Novas propriedades para controlar o estado da gravação/câmera no frontend
    public bool $isRecordingAudio = false;
    public bool $isCapturingPhoto = false;
    public ?string $mediaUploadType = null;

    protected $messages = [
        'mediaFile.mimes' => 'O arquivo deve ser uma imagem (jpg, jpeg, png, gif), áudio (mp3, wav, ogg, webm) ou vídeo (mp4, webm).',
        'mediaFile.max' => 'O arquivo não pode ter mais de 20MB.',
    ];

    protected function rules()
    {
        return [
            'message' => 'nullable|string|max:1000',
            'mediaFile' => [
                'nullable',
                File::types(['jpg', 'jpeg', 'png', 'gif', 'mp3', 'wav', 'ogg', 'webm', 'mp4'])
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

            $fullMimeType = $this->mediaFile->getMimeType();  
            $uploadedType = $this->mediaUploadType;

            if ($uploadedType === 'photo') {
                $mediaType = 'image';
            } elseif ($uploadedType === 'audio') {
                $mediaType = 'audio';
            } elseif (Str::startsWith($fullMimeType, 'image')) {
                $mediaType = 'image';
            } elseif (Str::startsWith($fullMimeType, 'video')) {
                $mediaType = 'video';
            } else {
                // Fallback para outros tipos ou se a flag não for reconhecida
                $mediaType = explode('/', $fullMimeType)[0];
            }

            $path = "$categoryName/{$room->id}/$mediaType";

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
        $this->mediaUploadType = null;
        $uploadedType = null;
        $this->isRecordingAudio = false; // Resetar estado da gravação
        $this->isCapturingPhoto = false; // Resetar estado da câmera

        $this->dispatch('messageSentLocally');
    }

    public function removeMediaFile()
    {
        $this->mediaFile = null;
        $this->isRecordingAudio = false; // Resetar estado da gravação
        $this->isCapturingPhoto = false; // Resetar estado da câmera
    }

    // Métodos para o frontend comunicar o estado de gravação/câmera
    public function setIsRecordingAudio(bool $value)
    {
        $this->isRecordingAudio = $value;
    }

    public function setIsCapturingPhoto(bool $value)
    {
        $this->isCapturingPhoto = $value;
    }

    public function render()
    {
        return view('livewire.web.chat.input-chat');
    }
}

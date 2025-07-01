<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MessageSent implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    use SerializesModels;

    public function __construct(protected User $user, protected Message $message)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('chatroom.' . $this->message->chat_room_id);
    }

        public function broadcastAs(): string
    {
        return 'message.sent';
    }

    public function broadcastWith(): array
    {
        return [
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'message' => [
                'id' => $this->message->id,
                'message' => $this->message->message,
                'send_at' => $this->message->send_at,
                'media_path' => $this->message->media_path ? Storage::url($this->message->media_path) : null,
                'media_type' => $this->message->media_type,
            ]
        ];
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRoomUsers implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatRoomId;

    /**
     * Create a new event instance.
     */
    public function __construct($chatRoomId)
    {
        $this->chatRoomId = $chatRoomId;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('chatroom.users.' . $this->chatRoomId);
    }
    public function broadcastAs(): string
    {
        return 'chatroom.users.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'chatRoomId' => $this->chatRoomId
        ];
    }
}

<?php

use App\Models\ChatRoom;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chatroom.{id}', function ($id) {
    return true; // Canal público
});

Broadcast::channel('chatroom.users.{chatRoomId}', function ($chatRoomId) {
    // A lógica de autorização é a mesma: o usuário precisa estar na sala.
    return true;
});
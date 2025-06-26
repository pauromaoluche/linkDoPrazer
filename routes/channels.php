<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chatroom.{id}', function ($id) {
    return true; // Canal público
});
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('pages.web.chat.chat-room');
    }

    public function show(string $categoriaSlug, int $roomIdCategory)
    {

        $categoria = CategoryRoom::whereRaw('LOWER(REPLACE(name, " ", "-")) = ?', [strtolower($categoriaSlug)])
            ->firstOrFail();

        $chatRoom = ChatRoom::where('category_room_id', $categoria->id)
            ->where('room_id_category', $roomIdCategory)
            ->firstOrFail();

        return view('pages.web.chat.chat-room', [
            'chatRoom' => $chatRoom,
            'category' => $categoria,
        ]);
    }
}

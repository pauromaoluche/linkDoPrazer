<?php

namespace App\Livewire\Web\Menu;

use App\Models\CategoryRoom;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public $userChatRooms;

    public function mount()
    {
        $this->loadRooms();
        if (Auth::check()) {
            $this->loadUserRooms();
        }
    }

    public function loadRooms()
    {
        $this->categories = CategoryRoom::with(['chatRoom:id,category_room_id,users'])->get();
    }

    public function loadUserRooms()
    {
        $this->userChatRooms = Auth::user()->chatRooms()->with('category_room')->get();
    }

    public function joinRoom($chat_room_id)
    {
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('auth');
        }

        if ($user->chatRooms()->where('chat_rooms_id', $chat_room_id)->exists()) {
            $this->loadUserRooms();
            #return redirect()->route('sala.show', ['id' => $chat_room_id]);
        }

        if ($user->chatRooms()->count() >= 2) {
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'Você atingiu o limites de salas gratuitas simultâneas!'
            ]);
            return;
        }

        $room = ChatRoom::find($chat_room_id);

        if (!$room) {
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Não foi possível entrar na sala.!'
            ]);
            return;
        }

        if ($room->users >= 25) {
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'A sala está cheia, tente novamente mais tarde.'
            ]);
            return;
        }

        try {
            $user->chatRooms()->attach($chat_room_id);
            $room->increment('users');

            $this->loadUserRooms();
            return redirect()->route('sala.show', ['id' => $chat_room_id]);
        } catch (\Exception $e) {
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);
            return;
        }
    }

    public function leaveRoom($chat_room_id)
    {
        if (!Auth::check()) {
            return redirect()->to(route('index'));
        }

        $user = Auth::user();

        if (!$user->chatRooms()->where('chat_rooms_id', $chat_room_id)->exists()) {
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'Você não está nessa sala.'
            ]);
            return;
        }

        $room = ChatRoom::find($chat_room_id);

        if (!$room) {
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'Sala não encontrada.'
            ]);
            return;
        }

        try {
            $user->chatRooms()->detach($chat_room_id);
            $room->decrement('users');

            $this->dispatch('notification', [
                'type' => 'success',
                'message' => 'Você saiu da sala com sucesso.'
            ]);
            //Implementar para que esteja em outra sala, ele apenas atualize a lista de salas
            #$this->loadUserRooms();
            #Caso esteja na sala que esta saindo, redireciona para a página inicial

            return redirect()->to(route('index'));
        } catch (\Throwable $e) {
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Erro ao sair da sala: ' . $e->getMessage()
            ]);
            return;
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->to(route('index'));
    }

    public function render()
    {
        return view('livewire.web.menu.menu');
    }
}

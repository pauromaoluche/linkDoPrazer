@extends('layouts.web')
@section('title', 'Chat - Link do Prazer')
@section('content')

    <body
        class="font-sans text-[#2d2d2d] dark:text-white bg-[#f5f5f5] dark:bg-gradient-to-br dark:from-black dark:to-red-950">

        <!-- Chat Layout -->
        <div class="flex h-[calc(100vh-64px)]">
        @php
            $fixedChatRoom = \App\Models\ChatRoom::find(1);
        @endphp
            @livewire('web.chat.online-users')
            <div class="flex-1 flex flex-col">
                {{-- @livewire('web.chat.chat-box') --}}
                <livewire:web.chat.chat-box :chatRoom="$fixedChatRoom" />
                {{-- <livewire:web.chat.input-chat :chatRoomId="1" /> --}}
                {{-- @livewire('web.chat.input-chat') --}}
                <livewire:web.chat.input-chat :chatRoomId="1" />
            </div>
            @livewire('web.chat.online-vip-users')

        </div>

        <!-- Botão para alternar tema -->
        <div class="fixed bottom-4 right-4">
            <button onclick="document.documentElement.classList.toggle('dark')"
                class="bg-[#2d2d2d] dark:bg-gray-200 text-white dark:text-black px-4 py-2 rounded shadow">
                Alternar Tema
            </button>
        </div>
    </body>
@endsection



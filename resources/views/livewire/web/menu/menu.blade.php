<header class="bg-[#b91c1c] dark:bg-[#1f1f1f] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/UOL_logo.svg/512px-UOL_logo.svg.png"
                    alt="Logo" class="h-8 w-auto">
                <span class="text-xl font-bold tracking-wider">Bate-Papo</span>
            </div>
            <nav class="hidden md:flex space-x-6 items-center">
                <div x-data="{ open: false }" class="relative group">
                    <button @click="open = !open" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">
                        Salas ▾
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute left-0 mt-2 bg-white dark:bg-[#2a2a2a] text-black dark:text-white shadow-lg rounded-md w-60 z-50 py-2"
                        x-transition>
                        @foreach ($categories as $category)
                            <div x-data="{ submenuOpen: false }" class="relative group" @mouseenter="submenuOpen = true"
                                @mouseleave="submenuOpen = false">
                                <div
                                    class="px-4 py-2 font-semibold hover:bg-gray-100 dark:hover:bg-[#333] cursor-pointer">
                                    {{ $category->name }}
                                </div>
                                <div x-show="submenuOpen"
                                    class="absolute left-full top-0 mt-0 bg-white dark:bg-[#2a2a2a] text-black dark:text-white shadow-lg rounded-md w-52 z-50"
                                    x-transition @mouseenter="submenuOpen = true" @mouseleave="submenuOpen = false">
                                    @foreach ($category->chatRoom as $key => $room)
                                        <a wire:click="joinRoom({{ $room->id }})"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-[#333] text-sm">
                                            {{ $category->name }} - {{ $key + 1 }} ({{ $room['users'] }} /
                                            25)
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a href="#" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">Temas</a>
                <a href="#" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">Benefícios VIP</a>
                <a href="#" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">App</a>
                <a href="#" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">Planos</a>
                <a href="#" class="hover:text-gray-300 dark:hover:text-red-400 font-medium">Ajuda</a>
            </nav>
            @auth
                <div x-data="{ openUserRooms: false }" class="relative group">
                    <button @click="openUserRooms = !openUserRooms"
                        class="hover:text-gray-300 dark:hover:text-red-400 font-medium">
                        Minhas Salas ▾
                    </button>
                    <div x-show="openUserRooms" @click.away="openUserRooms = false"
                        class="absolute right-0 mt-2 bg-white dark:bg-[#2a2a2a] text-black dark:text-white shadow-lg rounded-md w-60 z-50 py-2"
                        x-transition>
                        @if ($userChatRooms->isNotEmpty())
                            @foreach ($userChatRooms as $room)
                                <div
                                    class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-[#333] text-sm">
                                    <a href="/sala/{{ $room->id }}" class="flex-1">
                                        {{ $room->category_room->name }} - {{ $room->room_id_category }}
                                        ({{ $room->users }}/25)
                                    </a>
                                    <button title="Sair da sala" wire:click="leaveRoom({{ $room->id }})"
                                        class="text-red-600
                                        hover:text-red-800 mr-2">
                                        Sair
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                Você não está em nenhuma sala
                            </div>
                        @endif

                    </div>
                </div>
            @endauth
            <div class="flex items-center space-x-4">
                <button onclick="document.documentElement.classList.toggle('dark')"
                    class="bg-white dark:bg-gray-800 text-[#b91c1c] dark:text-white px-3 py-1 rounded-md font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    🌗 Tema
                </button>
                @auth
                    <button  wire:click="logout"
                        class="bg-white dark:bg-red-600 text-[#b91c1c] dark:text-white px-5 py-2 rounded-full font-bold hover:bg-gray-100 dark:hover:bg-red-700 transition">
                        Sair
                    </button>
                @else
                    <a href="{{ route('auth') }}"
                        class="bg-white dark:bg-red-600 text-[#b91c1c] dark:text-white px-5 py-2 rounded-full font-bold hover:bg-gray-100 dark:hover:bg-red-700 transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

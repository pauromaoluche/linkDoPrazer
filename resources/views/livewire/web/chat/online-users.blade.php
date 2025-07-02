<aside
    class="w-64 bg-[#e8e8e8] dark:bg-black dark:bg-opacity-60 p-4 overflow-y-auto border-r border-[#ddd] dark:border-red-900">
    <h2 class="text-lg font-semibold text-[#b91c1c] dark:text-red-400 mb-4">Usuários ({{ $totalOnline }})</h2>
    <ul class="space-y-3">
        @foreach ($onlineUsers as $user)
            <li class="flex justify-between items-center bg-white dark:bg-white/10 p-2 rounded shadow-sm">
                <span class="text-sm">🔥💋 {{ $user->name }}</span>
                <div class="space-x-1">
                    <button class="text-xs text-[#d97706] dark:text-yellow-400 hover:underline">Perfil</button>
                    <button class="text-xs text-[#b91c1c] dark:text-red-300 hover:underline">Privado</button>
                </div>
            </li>
        @endforeach
    </ul>
</aside>

<script type="module">
    Echo.channel("chatroom.users.{{ $chatRoom->id }}") // O NOVO CANAL
        .listen('.chatroom.users.updated', (e) => { // Ouve o evento 'updated' neste NOVO canal
            Livewire.dispatch('echo:chatroom.users.' + e.chatRoomId + ',updated');
        });
</script>

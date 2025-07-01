<div class="flex-1 overflow-y-auto p-6 space-y-4" id="mensagens">
    @foreach ($messages as $message)
        <div
            class="bg-white dark:bg-white/10 rounded-lg p-3 max-w-xl {{ $message->user_id === auth()->id() ? 'ml-auto text-right' : '' }} shadow">
            <p class="text-sm">
                <span class="font-bold text-[#b91c1c] dark:text-red-300">
                    {{ $message->user_id === auth()->id() ? 'Você' : $message->user->name }}:
                </span> {{ $message->message }}
            </p>

            {{-- Exibe a mídia (imagem ou áudio) --}}
            @if ($message->media_path)
                <div class="mt-2 flex justify-end">
                    @if (Str::startsWith($message->media_type, 'image'))
                        <img src=" {{ asset('storage/'.$message->media_path) }}" alt="Imagem do chat"
                            class="max-w-xs md:max-w-sm rounded-lg shadow-md border border-gray-200 dark:border-gray-700"
                            onload="scrollToBottomWithDelay(100)" {{-- Scroll após carregar a imagem --}}>
                    @elseif (Str::startsWith($message->media_type, 'audio'))
                        <audio controls src="{{ $message->media_path }}" class="w-full max-w-xs md:max-w-sm"
                            onloadeddata="scrollToBottomWithDelay(100)" {{-- Scroll após carregar metadados do áudio --}}></audio>
                    @else
                        {{-- Fallback para outros tipos de mídia (se você implementar futuramente) --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <a href="{{ $message->media_path }}" target="_blank" class="text-blue-500 hover:underline">
                                Abrir arquivo {{ $message->media_type }}
                            </a>
                        </p>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
</div>

<script>
    function scrollToBottomWithDelay(delay) {
        setTimeout(() => {
            const mensagensDiv = document.getElementById('mensagens');
            if (mensagensDiv) {
                mensagensDiv.scrollTo({
                    top: mensagensDiv.scrollHeight,
                    behavior: 'smooth'
                });
            }
        }, delay);
    }
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('novaMensagemViaWs', () => {
            scrollToBottomWithDelay(400); // Recomendo um delay único para ambos
        });

        Livewire.on('messageSentLocally', () => {
            scrollToBottomWithDelay(300); // Mantenha o mesmo delay para consistência
        });
    });
</script>

<script type="module">
    Echo.channel("chatroom.{{ $chatRoom->id }}")
        .listen('.message.sent', (e) => {
            Livewire.dispatch('novaMensagemViaWs', {
                user: e.user,
                message: e.message
            });
        });
</script>

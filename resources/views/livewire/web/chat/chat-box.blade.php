<div class="flex-1 overflow-y-auto p-6 space-y-4" id="mensagens">
    @foreach ($messages as $message)
        <div
            class="bg-white dark:bg-white/10 rounded-lg p-3 w-fit {{ $message->user_id === auth()->id() ? 'ml-auto text-right' : '' }} shadow">
            <p class="text-sm  break-words">
                <span class="font-bold text-[#b91c1c] dark:text-red-300">
                    {{ $message->user_id === auth()->id() ? 'Você' : $message->user->name }}:
                </span> {{ $message->message }}
            </p>

            @if ($message->media_path)
                <div class="mt-2 flex {{ $message->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    @if (Str::startsWith($message->media_type, 'image'))
                        <img src=" {{ asset('storage/' . $message->media_path) }}" alt="Imagem do chat"
                            class="max-w-xs md:max-w-sm rounded-lg shadow-md dark:border-gray-700"
                            onload="scrollToBottomWithDelay(100)">
                    @elseif (Str::startsWith($message->media_type, 'audio'))
                        <audio controls src="{{ asset('storage/' . $message->media_path) }}"
                            class="max-w-xs md:max-w-sm rounded-lg shadow-md dark:border-gray-700"
                            onloadeddata="scrollToBottomWithDelay(100)"></audio>
                        {{-- NOVO BLOCO PARA VÍDEO --}}
                    @elseif (Str::startsWith($message->media_type, 'video'))
                        <video controls src="{{ asset('storage/' . $message->media_path) }}"
                            class="max-w-xs md:max-w-sm rounded-lg shadow-md dark:border-gray-700"
                            onloadeddata="scrollToBottomWithDelay(100)"></video>
                    @else
                        {{-- Fallback para tipos de mídia desconhecidos --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <a href="{{ asset('storage/' . $message->media_path) }}" target="_blank"
                                class="text-blue-500 hover:underline">
                                Abrir arquivo ({{ $message->media_type }})
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

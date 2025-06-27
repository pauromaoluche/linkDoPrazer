<div class="flex-1 overflow-y-auto p-6 space-y-4" id="mensagens">
    @foreach ($messages as $message)
        <div
            class="bg-white dark:bg-white/10 rounded-lg p-3 max-w-xl {{ $message->user_id === auth()->id() ? 'ml-auto text-right' : '' }} shadow">
            <p class="text-sm">
                <span class="font-bold text-[#b91c1c] dark:text-red-300">
                    {{ $message->user_id === auth()->id() ? 'Você' : $message->user->name }}:
                </span> {{ $message->message }} {{ $message->send_at }}
            </p>
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

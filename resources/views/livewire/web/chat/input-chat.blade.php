<div
    class="bg-white dark:bg-black dark:bg-opacity-50 p-4 flex items-center gap-4 border-t border-[#ddd] dark:border-red-900"
    wire:submit.prevent="sendMessage"
    wire:keydown.enter="sendMessage"
>
    <input type="text" wire:model.defer="message" placeholder="Digite sua mensagem..."
        class="flex-1 bg-[#eeeeee] dark:bg-white/10 text-[#2d2d2d] dark:text-white placeholder-gray-600 dark:placeholder-gray-400 px-4 py-2 rounded focus:outline-none" />
    <button type="button" wire:click="sendMessage"
        class="bg-[#b91c1c] hover:bg-[#a61b1b] text-white font-semibold px-6 py-2 rounded">Enviar</button>
</div>

<div class="bg-white dark:bg-black dark:bg-opacity-50 p-4 flex items-center gap-4 border-t border-[#ddd] dark:border-red-900"
    wire:submit.prevent="sendMessage" wire:keydown.enter="sendMessage">
    <input type="text" wire:model.defer="message" placeholder="Digite sua mensagem..."
        class="flex-1 bg-[#eeeeee] dark:bg-white/10 text-[#2d2d2d] dark:text-white placeholder-gray-600 dark:placeholder-gray-400 px-4 py-2 rounded focus:outline-none" />

    <label for="media-file-upload" class="cursor-pointer bg-gray-200 hover:bg-gray-300 p-2 rounded-lg text-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.375 12.75c-.007 1.011-.122 2.016-.36 3.003-1.095 4.613-5.277 8.016-10.04 8.016-5.807 0-10.5-4.703-10.5-10.5S3.943 2.748 9.75 2.748c2.926 0 5.626 1.166 7.64 3.064M18.375 12.75V12m0 7.5V12m0-7.5V12m0 0h-3.75m3.75 0h3.75" />
        </svg>
    </label>
    <input id="media-file-upload" type="file" wire:model="mediaFile"
        accept="image/jpeg,image/png,image/gif,audio/mpeg,audio/wav,audio/ogg" class="hidden">
    @if ($mediaFile)
        <div class="relative flex items-center p-2 border rounded-lg bg-gray-50">
            @if (Str::startsWith($mediaFile->getMimeType(), 'image/'))
                <img src="{{ $mediaFile->temporaryUrl() }}" class="w-16 h-16 object-cover rounded-md mr-2">
            @elseif (Str::startsWith($mediaFile->getMimeType(), 'audio/'))
                <audio controls src="{{ $mediaFile->temporaryUrl() }}" class="w-48"></audio>
            @endif

            <span class="text-sm text-gray-600 truncate max-w-[150px]">{{ $mediaFile->getClientOriginalName() }}</span>

            <button type="button" wire:click="removeMediaFile"
                class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 text-xs leading-none flex items-center justify-center w-5 h-5">
                &times;
            </button>
        </div>
    @endif
    @error('message')
        <span class="text-red-500 text-sm block mt-1">{{ $message }}</span>
    @enderror
    @error('mediaFile')
        <span class="text-red-500 text-sm block mt-1">{{ $message }}</span>
    @enderror

    <button type="button" wire:click="sendMessage"
        class="bg-[#b91c1c] hover:bg-[#a61b1b] text-white font-semibold px-6 py-2 rounded">Enviar</button>
</div>

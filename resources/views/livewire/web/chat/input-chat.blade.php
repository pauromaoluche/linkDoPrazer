<div class="input-chat-container">
    <div
        class="bg-white dark:bg-black dark:bg-opacity-50 p-4 flex items-center gap-4 border-t border-[#ddd] dark:border-red-900">
        <form wire:submit.prevent="sendMessage" class="flex-1 flex items-center gap-4">
            <input type="text" wire:model.defer="message" placeholder="Digite sua mensagem..."
                class="flex-1 bg-[#eeeeee] dark:bg-white/10 text-[#2d2d2d] dark:text-white placeholder-gray-600 dark:placeholder-gray-400 px-4 py-2 rounded focus:outline-none" />

            <label for="media-file-upload"
                class="cursor-pointer bg-gray-200 hover:bg-gray-300 p-2 rounded-lg text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.375 12.75c-.007 1.011-.122 2.016-.36 3.003-1.095 4.613-5.277 8.016-10.04 8.016-5.807 0-10.5-4.703-10.5-10.5S3.943 2.748 9.75 2.748c2.926 0 5.626 1.166 7.64 3.064M18.375 12.75V12m0 7.5V12m0-7.5V12m0 0h-3.75m3.75 0h3.75" />
                </svg>
            </label>
            <input id="media-file-upload" type="file" wire:model.defer="mediaFile" accept="image/*,audio/*,video/*"
                class="hidden">
            <button type="button" x-data="{}" x-on:click="openCamera()"
                class="bg-gray-200 hover:bg-gray-300 p-2 rounded-lg text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15.5a2.25 2.25 0 002.25-2.25V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
            </button>

            <button type="button" x-data="{}" x-on:click="startAudioRecording()"
                class="bg-gray-200 hover:bg-gray-300 p-2 rounded-lg text-gray-700" x-show="!$wire.isRecordingAudio">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 18.75a6 6 0 006-6v-1.5m-6 1.5a6 6 0 00-6-6v-1.5m6 1.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V8.25a3 3 0 013-3m0 9.75a3 3 0 003-3V8.25a3 3 0 00-3-3m3 8.25h.008v.008H15V16.5z" />
                </svg>
            </button>

            <button type="button" x-data="{}" x-on:click="stopAudioRecording()"
                class="bg-red-500 hover:bg-red-600 p-2 rounded-lg text-white" x-show="$wire.isRecordingAudio">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 animate-pulse">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.25 15.75L12 18V21M12 3V6.75M12 15.75a3 3 0 01-3 3H10.5m-9 0H7.5M21 15.75h-3.75m-9-6h.008v.008H12V9.75zM12 18.75v-1.5m-4.5-5.625h12M7.5 7.5h.008v.008H7.5V7.5zM6.75 12a.75.75 0 01.75-.75H12a.75.75 0 01.75.75v1.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V12z" />
                </svg>
            </button>

            @if ($mediaFile)
                <div class="relative flex items-center p-2 border rounded-lg bg-gray-50 flex-shrink-0">
                    <span
                        class="text-sm text-gray-600 truncate max-w-[150px]">{{ $mediaFile->getClientOriginalName() }}</span>

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

            <button type="submit"
                class="bg-[#b91c1c] hover:bg-[#a61b1b] text-white font-semibold px-6 py-2 rounded">Enviar</button>
        </form>
    </div>
    {{-- modal para foto --}}
    <div x-data="{ open: $wire.isCapturingPhoto }" x-show="$wire.isCapturingPhoto"
        class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-lg w-full">
            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Tirar Foto</h2>
            <video id="camera-stream" class="w-full rounded-lg mb-4" autoplay playsinline></video>
            <canvas id="camera-canvas" class="hidden"></canvas>
            <div class="flex justify-between items-center">
                <button type="button" @click="closeCamera()"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="button" @click="takePhoto()"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tirar Foto</button>
            </div>
        </div>
    </div>

    {{-- Script JavaScript --}}
    <script>
        // Variáveis globais para os objetos de mídia
        let mediaRecorder;
        let audioChunks = [];
        let cameraStream;

        // Função para abrir a câmera (chamada pelo botão "Tirar Foto")
        function openCamera() {
            console.log('openCamera() chamada!');
            // Envia para o Livewire que o modal da câmera está aberto
            Livewire.find('<?php echo e($this->getId()); ?>').call('setIsCapturingPhoto', true);

            const video = document.getElementById('camera-stream');
            navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                })
                .then(stream => {
                    cameraStream = stream; // Armazena o stream para poder parar depois
                    video.srcObject = stream;
                    video.play();
                })
                .catch(err => {
                    console.error("Erro ao acessar a câmera: ", err);
                    alert("Não foi possível acessar a câmera. Verifique as permissões.");
                    Livewire.find('<?php echo e($this->getId()); ?>').call('setIsCapturingPhoto',
                        false); // Reseta estado em caso de erro
                });
        }

        // Função para fechar a câmera
        function closeCamera() {
            if (cameraStream) {
                cameraStream.getTracks().forEach(track => track.stop()); // Para todas as trilhas (vídeo/áudio)
                document.getElementById('camera-stream').srcObject = null; // Limpa o srcObject
            }
            // Envia para o Livewire que o modal da câmera está fechado
            Livewire.find('<?php echo e($this->getId()); ?>').call('setIsCapturingPhoto', false);
        }

        // Função para tirar a foto
        function takePhoto() {
            const video = document.getElementById('camera-stream');
            const canvas = document.getElementById('camera-canvas');
            const context = canvas.getContext('2d');

            // Garante que o canvas tenha o mesmo tamanho do vídeo para evitar distorções
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height); // Desenha o frame atual no canvas

            // Converte o conteúdo do canvas para um Blob (formato PNG)
            canvas.toBlob(blob => {
                const file = new File([blob], `photo-${Date.now()}.png`, {
                    type: 'image/png'
                });

                // Envia o arquivo para o Livewire, incluindo a flag 'type'
                Livewire.find('<?php echo e($this->getId()); ?>').upload('mediaFile', file, (uploadedFilename) => {
                    closeCamera();
                }, (error) => {
                    console.error('Erro no upload da foto:', error);
                    alert('Erro ao enviar a foto.');
                    closeCamera();
                }, (event) => {
                    // Progresso do upload (opcional)
                }, {
                    type: 'photo'
                }); // <<< Adicionado o meta data 'type'
            }, 'image/png'); // Formato da imagem capturada
        }

        // Função para iniciar a gravação de áudio
        function startAudioRecording() {
            Livewire.find('<?php echo e($this->getId()); ?>').call('setIsRecordingAudio', true);
            audioChunks = []; // Limpa os chunks anteriores

            // Solicita acesso ao microfone
            navigator.mediaDevices.getUserMedia({
                    audio: true
                })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream); // Cria o gravador de mídia

                    // Evento disparado quando há dados de áudio disponíveis
                    mediaRecorder.ondataavailable = event => {
                        audioChunks.push(event.data);
                    };

                    // Evento disparado quando a gravação é parada
                    mediaRecorder.onstop = () => {

                        const audioBlob = new Blob(audioChunks, {
                            type: 'audio/webm'
                        }); // Cria um Blob com os dados de áudio
                        const fileName = `audio-${Date.now()}.webm`; // Nome do arquivo
                        const file = new File([audioBlob], fileName, {
                            type: 'audio/webm'
                        }); // Cria um objeto File
                        console.log(file);
                        Livewire.find('<?php echo e($this->getId()); ?>').set('mediaUploadType', 'audio');
                        // Envia o arquivo de áudio para o Livewire, incluindo a flag 'type'
                        Livewire.find('<?php echo e($this->getId()); ?>').upload('mediaFile', file, (uploadedFilename) => {}, (
                            error) => {
                            console.error('Erro no upload do áudio:', error);
                            alert('Erro ao enviar o áudio.');
                        });


                        stream.getTracks().forEach(track => track.stop());
                    };
                    mediaRecorder.start(); // Inicia a gravação
                })
                .catch(err => {
                    console.error("Erro ao acessar o microfone: ", err);
                    alert("Não foi possível acessar o microfone. Verifique as permissões.");
                    Livewire.find('<?php echo e($this->getId()); ?>').call('setIsRecordingAudio',
                        false); // Reseta estado em caso de erro
                });
        }

        // Função para parar a gravação de áudio
        function stopAudioRecording() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop(); // Para a gravação
            }
            Livewire.find('<?php echo e($this->getId()); ?>').call('setIsRecordingAudio', false);
        }
    </script>
</div>

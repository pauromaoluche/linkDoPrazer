<div>
    <div x-data="{
        show: @entangle('show'),
        type: @entangle('type'),
        bgColor() {
            switch (this.type) {
                case 'success':
                    return 'bg-green-600';
                case 'error':
                    return 'bg-red-600';
                case 'warning':
                    return 'bg-yellow-500 text-black';
                case 'info':
                default:
                    return 'bg-blue-600';
            }
        }
    }"
    x-show="show"
    x-transition
    class="fixed bottom-6 right-6 px-5 py-4 rounded shadow-lg text-white"
    :class="bgColor()"
    style="display: none;"
    >
        <div>
            <strong x-text="type.charAt(0).toUpperCase() + type.slice(1)"></strong>: {{ $message }}
        </div>

        <!-- Barra de progresso -->
        <div class="mt-2 h-1 bg-white/30 rounded overflow-hidden">
            <div class="h-full bg-white animate-toast-progress"></div>
        </div>
    </div>

    <script>
        
        window.addEventListener('hide-notification', e => {
            setTimeout(() => {
                window.Livewire.dispatch('hideNotification');
            }, e.detail[0].timeout);
        });
    </script>

    <style>
        @keyframes toast-progress {
            from {
                width: 100%;
            }
            to {
                width: 0%;
            }
        }

        .animate-toast-progress {
            animation: toast-progress 3s linear forwards;
        }
    </style>
</div>

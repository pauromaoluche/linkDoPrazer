<div class="max-w-xl mx-auto p-6 shadow rounded min-h-screen flex items-center">
    <div class="bg-white dark:bg-black dark:bg-opacity-70 p-8 rounded-lg w-full max-w-3xl space-y-6 shadow-lg">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-2xl font-bold text-redchat dark:text-red-400">
                {{ $modo === 'register' ? 'Criar Conta' : 'Logar' }}</h2>
            <button onclick="toggleTheme()"
                class="text-sm px-3 py-1 rounded border border-gray-500 hover:bg-white hover:text-black transition dark:hover:bg-gray-200 dark:text-white">
                Alternar Tema
            </button>
        </div>
        <form class="space-y-5" wire:submit.prevent="{{ $modo === 'register' ? 'register' : 'login' }}">
            @if ($modo === 'register')
                <div>
                    <label for="apelido" class="block text-sm font-semibold mb-1">Apelido</label>
                    <input type="text" id="apelido" wire:model.lazy="form.name" name="apelido" required
                        class="w-full px-4 py-2 rounded bg-cinzaCampo dark:bg-white/10 text-textoClaro dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                    @error('form.name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            <div>
                <label for="email" class="block text-sm font-semibold mb-1">E-mail</label>
                <input type="email" id="email" wire:model.lazy="form.email" name="email" required
                    class="w-full px-4 py-2 rounded bg-cinzaCampo dark:bg-white/10 text-textoClaro dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('form.email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="senha" class="block text-sm font-semibold mb-1">Senha</label>
                <input type="password" id="senha" wire:model.defer="form.password" name="senha" required
                    class="w-full px-4 py-2 rounded bg-cinzaCampo dark:bg-white/10 text-textoClaro dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('form.password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            @if ($modo === 'register')
                <div>
                    <label for="confirmar_senha" class="block text-sm font-semibold mb-1">Confirmar Senha</label>
                    <input type="password" id="confirmar_senha" wire:model.defer="form.password_confirmation"
                        name="confirmar_senha" required
                        class="w-full px-4 py-2 rounded bg-cinzaCampo dark:bg-white/10 text-textoClaro dark:text-white placeholder-gray-600 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                    @error('form.password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            <button type="submit"
                class="w-full bg-redchat hover:bg-red-700 text-white font-semibold py-2 rounded transition">
                {{ $modo === 'register' ? 'Registrar' : 'Logar' }}
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 dark:text-gray-300">
            {{ $modo === 'register' ? 'Já' : 'Não' }} tem uma conta? <a href="#"
                wire:click.prevent="$set('modo', '{{ $modo === 'register' ? 'login' : 'register' }}')"
                class="text-yellow-600 dark:text-yellow-400 hover:underline">{{ $modo === 'register' ? 'Logar' : 'Registrar' }}</a>
        </p>
    </div>
</div>

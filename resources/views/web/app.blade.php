<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Minha Aplicação')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(to bottom right, #000000, #4d0000);
        }
    </style>
    @livewireStyles
</head>

<body class="text-white font-sans flex flex-col min-h-screen">
    @livewire('web.components.menu')
    <main class="flex-grow">
        @yield('content')
    </main>
    
    @livewire('web.components.notification-toast')
    <!-- Footer -->
    <footer class="bg-black text-gray-400 text-center text-sm py-6 px-4">
        <p>&copy; 2025 Link do Prazer. Todos os direitos reservados.</p>
        <p class="mt-2">Site exclusivo para maiores de 18 anos. <a href="#" class="underline text-gray-200">Leia
                os
                termos de uso</a>.</p>
    </footer>
    @livewireScripts
</body>

</html>

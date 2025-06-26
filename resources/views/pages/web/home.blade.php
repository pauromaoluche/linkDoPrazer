@extends('layouts.web')
@section('title', 'Página Inicial')
@section('content')

    <!-- Hero / Header -->
    <section class="text-center py-20 px-6">
        <h1 class="text-5xl font-extrabold text-red-500 mb-4">🔗 Link do Prazer</h1>
        <p class="text-xl max-w-2xl mx-auto text-gray-300 mb-8">
            Entre no mundo do prazer digital. Converse de forma anônima ou participe de salas exclusivas +18.
        </p>
        <div class="flex justify-center gap-4">
            <a href="#"
                class="bg-white text-red-700 font-bold px-6 py-3 rounded-full hover:bg-gray-200 transition">Entrar como
                Visitante</a>
            <a href="#" class="bg-red-800 text-white font-bold px-6 py-3 rounded-full hover:bg-red-700 transition">Criar
                Conta</a>
        </div>
    </section>

    <!-- Benefícios -->
    <section class="py-16 px-6">
        <h2 class="text-3xl font-bold text-center text-red-400 mb-10">Seja VIP para curtir muito mais</h2>
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 text-sm text-gray-300">
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">🔊 Mensagens de áudio <span
                        class="bg-red-600 text-white px-2 py-0.5 text-xs rounded">Novo</span></h3>
                <p>Envie áudios e se expresse como quiser.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">🚫 Nada de anúncios</h3>
                <p>Sem interrupções, só papo.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">🛑 Acesso a salas lotadas</h3>
                <p>Entre em qualquer sala sem limite.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">📍 Pessoas perto de você</h3>
                <p>Conecte-se com quem está por perto (10km).</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">👤 Personalize seu apelido</h3>
                <p>Use um nickname exclusivo.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">🔐 Privacidade e anonimato</h3>
                <p>Conversas protegidas e anônimas.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">📷 Compartilhamento seguro</h3>
                <p>Imagens com proteção contra prints e rastreamento.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">🎁 Eventos e sorteios exclusivos</h3>
                <p>Participe de eventos mensais apenas para VIPs.</p>
            </div>
            <div>
                <h3 class="text-lg text-red-300 font-semibold mb-2">📊 Estatísticas do perfil</h3>
                <p>Acompanhe quantas interações você teve e quem te curtiu.</p>
            </div>
        </div>
    </section>

    <!-- Planos -->
    <section class="py-20 px-6 text-center">
        <h2 class="text-4xl font-bold text-white mb-4">🔥 Escolha seu plano VIP</h2>
        <p class="text-gray-300 mb-12">Desbloqueie recursos exclusivos e viva o prazer completo.</p>
        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div class="bg-white text-black rounded-lg p-8 w-full max-w-xs">
                <h3 class="text-xl font-bold text-red-700 mb-2">Plano Mensal VIP</h3>
                <p class="text-2xl font-bold mb-4">R$ 9,90 <span class="text-sm font-normal">/ mês</span></p>
                <ul class="text-left text-sm mb-6">
                    <li>✔ Acesso total às salas</li>
                    <li>✔ Sem anúncios</li>
                    <li>✔ Filtros de localização</li>
                    <li>✔ Personalização de perfil</li>
                    <li>✔ Envio de imagens e áudios</li>
                </ul>
                <a href="#" class="block bg-red-700 text-white font-bold py-2 rounded hover:bg-red-600">Assinar</a>
            </div>
            <div class="bg-white text-black rounded-lg p-8 w-full max-w-xs border-4 border-yellow-400 relative">
                <div
                    class="absolute -top-4 left-1/2 -translate-x-1/2 bg-yellow-400 text-black px-4 py-1 text-xs font-bold rounded-full">
                    Mais Popular</div>
                <h3 class="text-xl font-bold text-red-700 mb-2">Plano Anual VIP</h3>
                <p class="text-2xl font-bold mb-4">12x R$ 5,90</p>
                <ul class="text-left text-sm mb-6">
                    <li>✔ Tudo do plano mensal</li>
                    <li>✔ Badge de membro anual</li>
                    <li>✔ Acesso antecipado a novidades</li>
                    <li>✔ Prioridade no suporte</li>
                    <li>✔ Sorteios mensais exclusivos</li>
                </ul>
                <a href="#" class="block bg-red-700 text-white font-bold py-2 rounded hover:bg-red-600">Assinar</a>
            </div>
        </div>
    </section>

    <!-- Comentários de Usuários -->
    <section class="py-20 px-6 bg-black bg-opacity-40">
        <h2 class="text-3xl font-bold text-center text-red-300 mb-12">💬 O que dizem nossos usuários VIP</h2>
        <div class="max-w-5xl mx-auto grid md:grid-cols-3 gap-8 text-sm text-white">
            <div class="bg-white bg-opacity-10 rounded-lg p-6">
                <p class="mb-4 italic">“Vale cada centavo! Conversas reais, pessoas interessantes e sem anúncios
                    irritantes.”</p>
                <p class="text-red-300 font-bold">— Amanda, SP</p>
            </div>
            <div class="bg-white bg-opacity-10 rounded-lg p-6">
                <p class="mb-4 italic">“Adorei o filtro de localização. Encontrei gente da minha cidade fácil.”</p>
                <p class="text-red-300 font-bold">— Bruno, RJ</p>
            </div>
            <div class="bg-white bg-opacity-10 rounded-lg p-6">
                <p class="mb-4 italic">“O melhor site de bate-papo adulto que já usei. Interface limpa e rápida.”</p>
                <p class="text-red-300 font-bold">— Carla, MG</p>
            </div>
        </div>
    </section>
@endsection

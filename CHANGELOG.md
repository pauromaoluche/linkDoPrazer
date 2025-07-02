## v2.4.0 [2025-07-02 09:05:39]

- **feat**: Invio de foto(camera) e audio

Arquivos modificados:
- `app/Events/MessageSent.php`
- `app/Livewire/Web/Chat/ChatBox.php`
- `app/Livewire/Web/Chat/InputChat.php`
- `config/livewire.php`
- `resources/views/livewire/web/chat/chat-box.blade.php`
- `resources/views/livewire/web/chat/input-chat.blade.php`

## v2.3.0 [2025-07-01 13:39:05]

- **feat**: Envio de imagem
- implementando envio de imagem no chat

Arquivos modificados:
- `app/Events/MessageSent.php`
- `app/Livewire/Web/Chat/ChatBox.php`
- `app/Livewire/Web/Chat/InputChat.php`
- `app/Models/Message.php`
- `config/livewire.php`
- `database/migrations/2025_06_30_100328_add_media_to_messages_table.php`
- `resources/views/livewire/web/chat/chat-box.blade.php`
- `resources/views/livewire/web/chat/input-chat.blade.php`

## v2.2.3 [2025-06-27 08:43:46]

- **improvement**: Deixando mais rapido o envio de mensagem e a maneira que recebemos ela

Arquivos modificados:
- `app/Events/MessageSent.php`
- `app/Livewire/Web/Chat/ChatBox.php`
- `app/Livewire/Web/Chat/InputChat.php`
- `resources/views/livewire/web/chat/chat-box.blade.php`

## v2.2.2 [2025-06-26 17:50:32]

- **improvement**: Retornar mensagens de acordo com a entrada na sala
- Feita pequena melhoria para retornar apenas as mensagens a partir do momento que o usuario entrou na sala

Arquivos modificados:
- `app/Livewire/Web/Chat/ChatBox.php`
- `app/Livewire/Web/Chat/InputChat.php`
- `app/Livewire/Web/Menu/Menu.php`
- `app/Models/User.php`
- `database/migrations/2025_06_25_134246_users_has_chat_rooms_table.php`
- `resources/views/livewire/web/menu/menu.blade.php`

## v2.2.1 [2025-06-26 16:03:18]

- **improvement**: Ajuste para entrar na sala de maneira dinamica

Arquivos modificados:
- `resources/views/livewire/web/chat/chat-box.blade.php`
- `resources/views/pages/web/chat/chat-room.blade.php`

## v2.2.0 [2025-06-26 15:46:14]

- **feat**: Url personalizada
- Feita url personalizada de acordo com a categoria e o numero da sala na categoria

Arquivos modificados:
- `app/Http/Controllers/Web/ChatController.php`
- `app/Livewire/Web/Menu/Menu.php`
- `database/seeders/CategoryRoomSeeder.php`
- `resources/views/pages/web/chat/chat-room.blade.php`
- `routes/web.php`

## v2.1.0 [2025-06-26 15:15:29]

- **feat**: Layout e websocket
- Implementando layout do chat, e websocket para mensagem em tempo real

Arquivos modificados:
- `app/Events/MessageSent.php`
- `app/Http/Controllers/Web/ChatController.php`
- `app/Livewire/Web/Chat/ChatBox.php`
- `app/Livewire/Web/Chat/InputChat.php`
- `app/Livewire/Web/Chat/OnlineUsers.php`
- `app/Livewire/Web/Chat/OnlineVipUsers.php`
- `bootstrap/app.php`
- `composer.json`
- `composer.lock`
- `config/broadcasting.php`
- `config/reverb.php`
- `package-lock.json`
- `package.json`
- `resources/js/app.js`
- `resources/js/bootstrap.js`
- `resources/js/echo.js`
- `resources/views/livewire/web/chat/chat-box.blade.php`
- `resources/views/livewire/web/chat/input-chat.blade.php`
- `resources/views/livewire/web/chat/online-users.blade.php`
- `resources/views/livewire/web/chat/online-vip-users.blade.php`
- `resources/views/pages/web/chat/chat-room.blade.php`
- `routes/channels.php`
- `routes/web.php`

## v2.0.1 [2025-06-26 08:55:39]

- **improvement**: ajustes

Arquivos modificados:
- `app/Livewire/Web/Menu/Menu.php`
- `app/Livewire/Web/Notification/NotificationToast.php`
- `config/livewire.php`
- `resources/views/layouts/web.blade.php`
- `resources/views/livewire/web/menu/menu.blade.php`
- `resources/views/livewire/web/notification/notification-toast.blade.php`
- `resources/views/pages/web/auth.blade.php`
- `resources/views/pages/web/home.blade.php`

## v2.0.0 [2025-06-26 08:53:04]

- **compat**: Refatorando estrutura de paginas
- Mudando estrutura das paginas principais

Arquivos modificados:
- `app/Http/Controllers/Web/AuthController.php`
- `app/Http/Controllers/Web/HomeController.php`
- `resources/views/layouts/web.app.blade.php`
- `resources/views/pages/web/auth.blade.php`
- `resources/views/pages/web/home.blade.php`
- `resources/views/welcome.blade.php`

## v1.16.2 [2025-06-25 22:14:14]

- **improvement**: Rota de logout

Arquivos modificados:
- `app/Http/Middleware/AuthenticateMiddleware.php`
- `app/Livewire/Web/Components/Menu.php`
- `resources/views/livewire/web/components/menu.blade.php`
- `routes/web.php`

## v1.16.1 [2025-06-25 21:24:09]

- **feat**: Sair da sala
- Implementado melhoria e validação para o usuario sair da sala

Arquivos modificados:
- `app/Livewire/Web/Components/Menu.php`
- `resources/views/livewire/web/components/menu.blade.php`
- `resources/views/livewire/web/components/notification-toast.blade.php`

## v1.15.1 [2025-06-25 17:20:35]

- **feat**: Adicionado opcao de entrar na sala
- Agora podemos entrar na sala, com limite de 2 salas por usuario

Arquivos modificados:
- `app/Livewire/Web/Components/Menu.php`
- `resources/views/livewire/web/components/menu.blade.php`
- `resources/views/web/app.blade.php`

## v1.14.1 [2025-06-25 17:19:40]

- **feat**: Adicionando id da sala na categoria

Arquivos modificados:
- `app/Models/ChatRoom.php`
- `database/migrations/2025_06_25_133810_create_chat_rooms_table.php`
- `database/seeders/ChatRoomSeeder.php`

## v1.13.1 [2025-06-25 17:15:32]

- **feat**: Notificacao toast
- Implementando notificacao toast

Arquivos modificados:
- `app/Livewire/Web/Components/NotificationToast.php`
- `resources/views/livewire/web/components/notification-toast.blade.php`

## v1.12.1 [2025-06-25 11:53:17]

- **feat**: Implementando listagem de salas, e salas do usuario logado

Arquivos modificados:
- `app/Livewire/Web/Components/Menu.php`
- `resources/views/livewire/web/components/menu.blade.php`

## v1.11.1 [2025-06-25 11:02:08]

- **feat**: Populando banco com seeders

Arquivos modificados:
- `database/seeders/CategoryRoomSeeder.php`
- `database/seeders/ChatRoomSeeder.php`
- `database/seeders/DatabaseSeeder.php`

## v1.10.1 [2025-06-25 10:53:38]

- **feat**: Criando resto dos relacionamentos e tabelas

Arquivos modificados:
- `app/Models/CategoryRoom.php`
- `app/Models/ChatRoom.php`
- `app/Models/Message.php`
- `app/Models/User.php`
- `database/migrations/2025_06_25_134645_create_messages_table.php`

## v1.9.1 [2025-06-25 10:45:54]

- **feat**: Relacionamento de usuario e salas

Arquivos modificados:
- `app/Models/ChatRoom.php`
- `app/Models/User.php`
- `database/migrations/2025_06_25_134246_users_has_chat_rooms_table.php`

## v1.8.1 [2025-06-25 10:41:10]

- **feat**: Categorias e salas

Arquivos modificados:
- `app/Models/CategoryRoom.php`
- `app/Models/ChatRoom.php`
- `database/migrations/2025_06_25_133442_create_category_rooms_table.php`
- `database/migrations/2025_06_25_133810_create_chat_rooms_table.php`
- `database/seeders/CategoryRoomSeeder.php`
- `database/seeders/ChatRoomSeeder.php`

## v1.7.1 [2025-06-25 10:36:45]

- **feat**: Model e migration de categorty_room

## v1.6.1 [2025-06-25 10:16:45]

- **feat**: Implementando menu

Arquivos modificados:
- `app/Livewire/Web/Components/Menu.php`
- `resources/views/livewire/web/components/menu.blade.php`
- `resources/views/web/app.blade.php`
- `resources/views/web/auth/index.blade.php`

## v1.5.1 [2025-06-25 09:57:47]

- **feat**: Login e remember-me
- Corrigindo validacao de login, e implementando remember-me

Arquivos modificados:
- `app/Livewire/Web/Auth/Auth.php`
- `config/session.php`
- `resources/views/livewire/web/auth/auth.blade.php`
- `resources/views/web/auth/index.blade.php`

## v1.4.1 [2025-06-24 19:38:42]

- **feat**: Registro de usuario
- Feita implementação de registro de usuario

Arquivos modificados:
- `.gitignore`
- `app/Http/Controllers/Web/AuthController.php`
- `app/Livewire/Forms/Web/AuthForm.php`
- `app/Livewire/Web/Auth.php`
- `resources/views/livewire/web/auth.blade.php`
- `resources/views/web/auth/index.blade.php`
- `routes/web.php`

## v1.3.1 [2025-06-24 09:40:35]

- **feat**: Adicionando dependencia do tailwind
- Adicionando tailwind no projeto

Arquivos modificados:
- `app/Http/Controllers/Web/HomeController.php`
- `package-lock.json`
- `package.json`
- `postcss.config.js`
- `resources/views/web/app.blade.php`
- `resources/views/web/home/index.blade.php`
- `routes/web.php`

## v1.2.1 [2025-06-18 16:49:48]

- **feat**: Instalando tailwind no projeto

Arquivos modificados:
- `package-lock.json`
- `package.json`
- `resources/css/app.css`
- `tailwind.config.js`

## v1.1.1 [2025-06-18 16:46:13]

- **feat**: instalando livewire
- Iniciando livewire no projeto para utilizar componentizacao

Arquivos modificados:
- `composer.json`
- `composer.lock`

# Changelog

## v1.0.1 [2025-06-18 16:44:29]

- **fix**: pequena correcao

Arquivos modificados:
- `.gitignore`
- `package-lock.json`
- `resources/views/web/app.blade.php`
- `resources/views/welcome.blade.php`


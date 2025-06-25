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


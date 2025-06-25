<?php

namespace App\Livewire\Web\Auth;

use App\Livewire\Forms\Web\AuthForm;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth as LaravelAuth;;

class Auth extends Component
{

    public AuthForm $form;

    public string $login_email = '';
    public string $login_password = '';
    // 'login' ou 'register'
    public $modo = 'login';

    public bool $remember = false;

    public function register()
    {
        $this->form->validate();

        $user = User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => $this->form->password,
        ]);

        LaravelAuth::login($user, $this->remember);
        session()->regenerate();

        return redirect()->to(route('index'));
    }

    public function login()
    {

        $this->validate([
            'login_email' => 'required|email',
            'login_password' => 'required',
        ]);

        if (!LaravelAuth::attempt([
            'email' => $this->login_email,
            'password' => $this->login_password,
        ], $this->remember)) {
            throw ValidationException::withMessages([
                'login_email' => 'O E-mail pode estar errado.',
                'login_password' => 'A senha pode estar errada.',
            ]);
        }

        session()->regenerate();

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.web.auth.auth');
    }
}

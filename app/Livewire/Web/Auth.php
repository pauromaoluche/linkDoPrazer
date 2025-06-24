<?php

namespace App\Livewire\Web;

use App\Livewire\Forms\Web\AuthForm;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth as LaravelAuth;;

class Auth extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $modo = 'login'; // 'login' ou 'register'

    public AuthForm $form;

    public function register()
    {
        $this->form->validate();

        $user = User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => $this->form->password,
        ]);

        LaravelAuth::login($user);
        session()->regenerate();

        return redirect()->to(route('index'));
    }

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!LaravelAuth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Credenciais inválidas.',
            ]);
        }

        session()->regenerate();

        return redirect()->route('index');
    }

    public function resetForm()
    {
        $this->reset([
            'email',
            'password',
            'name',
            'password_confirmation',
        ]);
    }

    public function render()
    {
        return view('livewire.web.auth');
    }
}

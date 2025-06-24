<?php

namespace App\Livewire\Forms\Web;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AuthForm extends Form
{
    #[Rule(['required', 'email', 'unique:users,email'])]
    public $email = '';
    #[Rule(['required', 'string', 'max:255'])]
    public $name = '';
    #[Rule(['required', 'min:6', 'confirmed'])]
    public $password = '';

    public $password_confirmation = '';

    public function messages(): array
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'name.required' => 'O nome é obrigatório.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',
        ];
    }
}

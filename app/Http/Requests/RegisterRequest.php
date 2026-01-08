<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255', 'unique:users_accounts'],
            'username' => ['required', 'string', 'max:255', 'unique:users_accounts'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users_accounts'],
            'password' => [
                'required', 
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'phone_number' => ['nullable', 'string', 'max:20', 'unique:users_accounts'],
        ];
    }
}

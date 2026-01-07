<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Models\UserAccount;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users_accounts,username',
            'email' => 'required|string|email|max:255|unique:users_accounts,email',
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone_number' => 'nullable|string|max:20',
        ];
    }
}

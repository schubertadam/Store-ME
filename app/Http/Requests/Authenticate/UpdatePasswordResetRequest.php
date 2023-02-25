<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordResetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function authorize(): bool
    {
        return !auth()->check();
    }
}

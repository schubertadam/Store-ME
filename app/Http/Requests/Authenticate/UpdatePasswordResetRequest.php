<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePasswordResetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', Rule::exists('password_resets', 'email')->where('token', $this->input('token'))],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }

    public function authorize(): bool
    {
        return !auth()->check();
    }
}

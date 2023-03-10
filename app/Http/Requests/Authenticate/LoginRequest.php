<?php

namespace App\Http\Requests\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            '*' => 'required'
        ];
    }

    public function authorize(): bool
    {
        return !auth()->check();
    }
}

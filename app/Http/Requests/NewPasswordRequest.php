<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:6|max:32',
            'passwordConfirm' => 'same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.max' => 'Le mot de passe doit contenir au plus 32 caractères.',
            'passwordConfirm.same' => 'Les deux mot de passe ne sont pas identiques.'
        ];
    }
}

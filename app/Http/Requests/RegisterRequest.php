<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:4',
                'confirmed',
            ],
            'is_admin' => 'sometimes|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le nom est obligatoire.",
            'email.required' => "L'adresse email est obligatoire.",
            'email.email' => "L'adresse email doit être valide.",
            'email.unique' => "Cette adresse email est déjà utilisée.",
            'password.required' => "Le mot de passe est obligatoire.",
            'password.confirmed' => "Les mots de passe ne correspondent pas.",
            'password.min' => "Le mot de passe doit contenir au moins :min caractères.",
        ];
    }
}

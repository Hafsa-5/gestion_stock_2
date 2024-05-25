<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Veuillez entrer votre ancien mot de passe.',
            'new_password.required' => 'Veuillez entrer un nouveau mot de passe.',
            'new_password.min' => 'Le nouveau mot de passe doit comporter au moins 8 caractères.',
            'confirm_new_password.required' => 'Veuillez confirmer le nouveau mot de passe.',
            'confirm_new_password.same' => 'Le nouveau mot de passe et la confirmation ne correspondent pas.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nom' => "required|min:3",
            'prenom' => "required|min:3",
            'phone' => "required|regex:/^\d{10}$/|unique:users,phone,". $this->route('id'),
            'email' => "required|email|unique:users,email," . $this->route('id'),
            'password' => "required|min:8",
        ];
    }

    public function messages(){
        return [
            'nom.required' => "Le champ Nom est obligatoire.",
            'nom.min' => "Le champ Nom doit avoir au moins 3 caractères.",
            'prenom.required' => "Le champ Prénom est obligatoire.",
            'prenom.min' => "Le champ Prénom doit avoir au moins 3 caractères.",
            'phone.required' => "Le champ Téléphone est obligatoire.",
            'phone.unique' => "Ce numéro de téléphone est déjà utilisé.",
            'phone.regex' => "Le format du numéro de téléphone est invalide.",
            'email.required' => "Le champ Email est obligatoire.",
            'email.email' => "Veuillez fournir une adresse email valide.",
            'email.unique' => "Cette adresse email est déjà utilisée.",
            'password.required' => "Le champ Mot de passe est obligatoire.",
            'password.min' => "Le champ Mot de passe doit avoir au moins 8 caractères.",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImmeubleRequest extends FormRequest
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
            'nom' => 'required',
            'adresse' => 'required|unique:immeubles,adresse,'.$this->route('id'),
            'code_postal' => 'required|numeric',
            'ville_id' => 'required',
            'nb_etages' => 'required|numeric',
            'nb_logements' => 'required|numeric',
            'annee_construction' => 'required|date_format:Y',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ "Nom" est obligatoire.',
            'adresse.required' => 'Le champ "Adresse" est obligatoire.',
            'adresse.unique' => 'Cette adresse est déjà utilisée par un autre immeuble.',
            'code_postal.required' => 'Le champ "Code Postal" est obligatoire.',
            'code_postal.numeric' => 'Le champ "Code Postal" doit être un nombre.',
            'ville_id.required' => 'Le champ "Ville" est obligatoire.',
            'nb_etages.required' => 'Le champ "Nombre d\'étages" est obligatoire.',
            'nb_etages.numeric' => 'Le champ "Nombre d\'étages" doit être un nombre.',
            'nb_logements.required' => 'Le champ "Nombre de logements" est obligatoire.',
            'nb_logements.numeric' => 'Le champ "Nombre de logements" doit être un nombre.',
            'annee_construction.required' => 'Le champ "Année de construction" est obligatoire.',
            'annee_construction.date_format' => 'Le champ "Année de construction" doit être une année valide au format YYYY.',
        ];
    }
}

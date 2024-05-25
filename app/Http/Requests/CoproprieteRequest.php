<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoproprieteRequest extends FormRequest
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
            'adresse' => 'required|unique:coproprietes,adresse,'.$this->route('id'),
            'code_postal' => 'required|numeric',
            'ville_id' => 'required',
            'interface' => 'required',
            'nb_lots' => 'required|numeric',
            'date_creation' => 'required|date',
            'date_modification' => 'nullable|date',
            'immeuble_id' => 'required',
            'coproprietaire_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ "Nom" est obligatoire.',
            'adresse.required' => 'Le champ "Adresse" est obligatoire.',
            'adresse.unique' => 'L\'adresse spécifiée existe déjà.',
            'code_postal.required' => 'Le champ "Code Postal" est obligatoire.',
            'code_postal.numeric' => 'Le champ "Code Postal" doit être un nombre.',
            'ville_id.required' => 'Le champ "Ville" est obligatoire.',
            'interface.required' => 'Le champ "Interface" est obligatoire.',
            'nb_lots.required' => 'Le champ "Nombre de Lots" est obligatoire.',
            'nb_lots.numeric' => 'Le champ "Nombre de Lots" doit être un nombre.',
            'date_creation.required' => 'Le champ "Date de création" est obligatoire.',
            'date_creation.date' => 'Le champ "Date de création" doit être une date valide.',
            'date_modification.date' => 'Le champ "Date de modification" doit être une date valide.',
            'immeuble_id.required' => 'Le champ "ID de l\'immeuble" est obligatoire.',
            'coproprietaire_id.required' => 'Le champ "ID du copropriétaire" est obligatoire.',
        ];
    }
}

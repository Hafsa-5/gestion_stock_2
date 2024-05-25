<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|min:3|unique:roles,name,'.$this->route('id'),
            'permission' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => "Le champ Role est obligatoire.",
            'name.min' => "Le champ Role doit avoir au moins 3 caractères.",
            'name.unique' => "Ce Role est déjà utilisé.",
            'permission.required' => "Le champ permission est obligatoire.",
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class producto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return ;
    }


    public function rules(): array
    {
        return [
            'nomnre' => 'required|string|max:100',
            'email' => 'required|email',
            'motivo' => 'required|string|min:5',
            'consulta' => 'required|string|min:10',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages() array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.requierd' => 'El mail es obligatorio.',
            'email.email' => 'Formato de email invalido.',
            'consulta.min' => 'required|string|min:10',

        ];
    }
}

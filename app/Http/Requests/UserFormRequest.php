<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserFormRequest
 * @package App\Http\Requests
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string cep
 * @property string street
 * @property string number
 * @property string neighborhood
 * @property string city
 * @property string state
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */

class UserFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => ['required', 'max:255', 'min: 3'],
            'email'        => ['required', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'min:6'],
            'cep'          => ['required', 'min:8'],
            'street'       => ['required'],
            'number'       => ['required'],
            'neighborhood' => ['required'],
            'city'         => ['required'],
            'state'        => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => '- Nome é obrigatório.',
            'name.max'                => '- Nome muito grande.',
            'name.min'                => '- Nome deve conter no minimo 3 letras.',
            'email.email'             => '- Email inválido.',
            'email.required'          => '- E-mail é obrigatório.',
            'email.unique'            => '- E-mail já existente.',
            'password.required'       => '- Senha é obrigatório.',
            'password.min'            => '- Senha deve conter no minimo 6 caracteres.',
            'cep.required'            => '- CEP é obrigatório.',
            'cep.min'                 => '- CEP inválido.',
            'street.required'         => '- Rua é obrigatório.',
            'number.required'         => '- Número é obrigatório.',
            'neighborhood.required'   => '- Bairro é obrigatório.',
            'city.required'           => '- Cidade é obrigatório.',
            'state.required'          => '- Estado é obrigatório.',
        ];
    }
}

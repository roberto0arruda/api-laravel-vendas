<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginFormRequest
 * @package App\Http\Requests
 * @property string email
 * @property string password
 */

class LoginFormRequest extends FormRequest
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
            'email'        => ['required', 'email'],
            'password'     => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.email'             => '- Email inválido.',
            'email.required'          => '- E-mail é obrigatório.',
            'password.required'       => '- Senha é obrigatório.',
        ];
    }
}


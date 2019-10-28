<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductFormRequest
 * @package App\Http\Requests
 * @property
 * @property int id
 * @property string cod_product
 * @property string name
 * @property float price
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */

class ProductFormRequest extends FormRequest
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
            'name'         => 'required|max:255|unique:products',
            'cod_product'  => 'required|min:4|unique:products',
            'price'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => '- Nome do produto é obrigatório.',
            'price.required'          => '- Preço do produto é obrigatório.',
            'name.unique'             => '- Nome do produto já existente.',
            'cod_product.required'    => '- Cód. do produto é obrigatório.',
            'cod_product.unique'      => '- Cód. do produto já existente.',
            'cod_product.min'         => '- Cód. do produto tem que ter no mínimo 4 caracteres.',
        ];
    }
}

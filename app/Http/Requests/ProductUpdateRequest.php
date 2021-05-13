<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'                  => 'sometimes|string|unique:products',
            'description'           => 'sometimes|string',
            'price'                 => 'sometimes|numeric',
            'sku'                   => 'sometimes|string|unique:products',
            'stock_amount'          => 'sometimes|integer',
            'client_id'             => 'sometimes|exists:clients,id',
            'updated_at'            => 'sometimes|date',
        ];
    }
}

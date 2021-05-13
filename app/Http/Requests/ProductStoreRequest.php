<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name'                  => 'required|string|unique:products',
            'description'           => 'nullable|string',
            'price'                 => 'required|numeric',
            'sku'                   => 'required|string|unique:products',
            'stock_amount'          => 'required|integer',
            'client_id'             => 'exists:clients,id',
            'created_at'            => 'sometimes|date',
            'updated_at'            => 'sometimes|date',
        ];
    }
}

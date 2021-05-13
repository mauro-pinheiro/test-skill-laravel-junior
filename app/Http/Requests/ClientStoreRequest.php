<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'document'          => 'required|string|unique:clients',
            'document_type'     => 'required|string',
            'full_name'         => 'required|string',
            'phone'             => 'required|string',
            'user_id'           => 'exists:users,id|unique:clients',
            'created_at'        => 'sometimes|date',
            'updated_at'        => 'sometimes|date',
        ];
    }
}

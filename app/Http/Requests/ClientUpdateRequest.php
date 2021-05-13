<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'document'          => 'sometimes|string|unique:clients',
            'document_type'     => 'sometimes|string',
            'full_name'         => 'sometimes|string',
            'phone'             => 'sometimes|string',
            'user_id'           => 'exists:users,id|unique:clients',
            'updated_at'        => 'sometimes|date',
        ];
    }
}

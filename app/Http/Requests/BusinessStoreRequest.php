<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'value_proposition' => 'required|string',
            'key_resources' => 'required|string',
            'customer_segment' => 'required|string',
            'value' => 'required',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'document' => 'required',
            'sector' => 'required',
            'location' => 'required'
        ];
    }
}

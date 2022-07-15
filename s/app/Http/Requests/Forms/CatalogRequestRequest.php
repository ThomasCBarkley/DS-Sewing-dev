<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CatalogRequestRequest extends FormRequest
{
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ' :attribute is required.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ];
    }
}

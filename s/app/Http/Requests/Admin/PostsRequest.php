<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostsRequest extends FormRequest
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
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->input('slug') == '') {
            $this->merge([
                'slug' => Str::slug($this->input('title'))
            ]);
        } else {
            $this->merge([
                'slug' => Str::slug($this->input('slug'))
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'slug' => 'unique:posts,slug,' . (optional($this->post)->id ?: 'NULL'),
        ];
    }
}

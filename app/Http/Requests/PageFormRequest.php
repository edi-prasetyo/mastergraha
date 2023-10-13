<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'content' => [
                'required',
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'meta_title' => [
                'nullable',
            ],
            'meta_description' => [
                'nullable',
            ],
            'meta_keywords' => [
                'nullable',
            ],
        ];
    }
}

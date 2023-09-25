<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpgradeFrormRequest extends FormRequest
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
            'merchant_id' => [
                'nullable',
                'string'
            ],
            'merchant_name' => [
                'required',
                'string'
            ],
            'merchant_address' => [
                'required',
                'string'
            ],
            'bank_name' => [
                'required',
                'string'
            ],
            'bank_account' => [
                'required',
                'string'
            ],
            'bank_number' => [
                'required',
                'string'
            ],
            'avatar' => [
                'nullable',
                'string'
            ],
        ];
    }
}

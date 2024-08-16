<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes','required', 'string'],
            'last_name' => ['sometimes','required', 'string'],
            'company_name' => ['sometimes','required', 'string'],
            'email' => ['sometimes','required', 'string', 'email'],
            'number' => ['sometimes','required', 'string'],
            'date_birth' => ['sometimes','required', 'string'],
            'adress' => ['sometimes','required', 'string'],
            'sex' => ['sometimes','required', 'string'],
            'socials' => ['sometimes','required', 'string'],
        ];

    }
}

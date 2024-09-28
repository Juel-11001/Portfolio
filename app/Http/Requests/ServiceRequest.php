<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_name' => ['required','max:255'],
            'service_desc'=>['required','max:500'],
        ];

    }
    public function messages()
    {
        return [
            'service_name.required' => 'Service name is required',
            'service_name.max' => 'Service name must not exceed 255 characters',
            'service_desc.required' => 'Service description is required',
            'service_desc.max' => 'Service description must not exceed 500 characters',
        ];
    }
}

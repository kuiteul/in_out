<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "user-id" => "required|string|min:36|max:36",
            "employee-id" => "required|string|min:36|max:36",
            "password" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "employee-id.required" => "You must select an employee"
        ];
    }
}

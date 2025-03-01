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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . optional($this->user)->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'recrut_date' => 'nullable|date',
            'contract_type' => 'nullable|string',
            'salary' => 'nullable|numeric|between:0,999999.99',
            'status' => 'nullable|boolean',
            'department_id' => 'nullable|exists:departments,id',
            'contract_id' => 'nullable|exists:contracts,id',
            'emplois_id' => 'nullable|exists:emplois,id',
            'role' => 'required|exists:roles,name',
        ];
    }
}

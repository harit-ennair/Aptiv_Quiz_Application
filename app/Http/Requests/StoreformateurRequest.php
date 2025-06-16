<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreformateurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && in_array(auth()->user()->role_id, [1, 2]); // Super admin or admin
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:formateurs,identification',
        ];
    }
}

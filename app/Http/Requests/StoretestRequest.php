<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoretestRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string|max:1000',
            'formateur_id' => 'required|exists:formateurs,id',
            'process_id' => 'nullable|exists:processes,id',
            'category_id' => 'nullable|exists:categories,id',
            'resultat' => 'required|integer|min:0|max:100',
            'pourcentage' => 'required|integer|min:0|max:100',
        ];
    }
}

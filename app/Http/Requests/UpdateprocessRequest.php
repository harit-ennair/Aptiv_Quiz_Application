<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateprocessRequest extends FormRequest
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
        $processId = $this->route('process')->id ?? null;
        
        return [
            'title' => 'required|string|max:255|unique:processes,title,' . $processId,
            'description' => 'required|string|max:1000',
        ];
    }
}

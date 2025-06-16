<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorequzRequest extends FormRequest
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
            'question_text' => 'required|string|max:1000',
            'categories_id' => 'required|exists:categories,id',
            'answers' => 'required|array|min:2|max:6',
            'answers.*.answer_text' => 'required|string|max:500',
            'answers.*.is_correct' => 'boolean',
        ];
    }
}

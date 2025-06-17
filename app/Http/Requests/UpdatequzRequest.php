<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatequzRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Pour les tests - autoriser toujours (à changer en production)
        return true;
        // return auth()->check() && in_array(auth()->user()->role_id, [1, 2]); // Super admin or admin
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_text' => 'nullable|string|max:1000|required_without:image',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|required_without:question_text',
            'remove_image' => 'boolean',
            'categories_id' => 'required|exists:categories,id',
            'answers' => 'required|array|min:2|max:6',
            'answers.*.id' => 'nullable|exists:repos,id',
            'answers.*.answer_text' => 'required|string|max:500',
            'answers.*.is_correct' => 'required|in:0,1,true,false',
        ];
    }

    public function messages(): array
    {
        return [
            'question_text.required_without' => 'Le texte de la question est requis si aucune image n\'est fournie.',
            'image.required_without' => 'Une image est requise si aucun texte de question n\'est fourni.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format: jpeg, png, jpg, gif, svg.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}

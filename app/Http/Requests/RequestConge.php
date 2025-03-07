<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestConge extends FormRequest
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
            'date_debut' => ['required', 'date', 'after:' . now()->addDays(6)->format('Y-m-d')],
            'date_fin' => ['required', 'date', 'after_or_equal:start_date'],
            'raison' => 'nullable|string|max:255',
        ];
      
    }

    public function messages(): array
    {
        return [
            'date_debut.required' => 'La date de début est obligatoire.',
            'date_debut.date' => 'La date de début doit être une date valide.',
            'date_debut.after' => 'La date de début doit être au moins 7 jours après aujourd\'hui.',
            'date_fin.required' => 'La date de fin est obligatoire.',
            'date_fin.date' => 'La date de fin doit être une date valide.',
            'date_fin.after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',
            'raison.string' => 'La raison doit être une chaîne de caractères.',
            'raison.max' => 'La raison ne doit pas dépasser 255 caractères.',
        ];
    }
}

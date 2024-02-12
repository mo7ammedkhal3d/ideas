<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIdeaRequest extends FormRequest
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
            'content' => 'required|min:8|max:240',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'You missing enter idea to post ?!!! 😒',
            'content.min' => 'The idea at leat must contain 8 charachters 😊🥸',
            'content.max' => 'The idea text is too long 😐 please enter less charachetrs',
        ];
    }
}

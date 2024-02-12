<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIdeaRequest extends FormRequest
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

    public function messages():array{

        return [
            'content.required' => 'You are missing to enter an idea to post! 😒',
            'content.min' => 'The idea must contain at least 8 characters! 😊🥸',
            'content.max' => 'The idea text is too long! 😐 Please enter fewer characters.',
        ];
    }
}

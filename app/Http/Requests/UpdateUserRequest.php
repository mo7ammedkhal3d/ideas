<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update',$this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:50',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name here 😊',
            'name.min' => 'Enter a name with at least :min characters.',
            'name.max' => 'The name is too long. Enter a name with at most :max characters.',
            'bio.min' => 'Bio should have at least :min characters.',
            'bio.max' => 'Bio should have at most :max characters.',
            'image' => 'The uploaded file must be an image.',
        ];
    }
}

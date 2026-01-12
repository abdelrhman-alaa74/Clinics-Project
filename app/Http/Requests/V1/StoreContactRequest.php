<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'contact_name' => ['required' , 'string' , 'max:255'],
            'contact_email' => ['required' , 'email' , 'max:255'],
            'contact_subject' => ['required' , 'string' , 'max:255'],
            'contact_message' => ['required' , 'string'],
            // Request 
        ];
    }

        public function messages(): array
    {
        return [
            'contact_name.required' => 'Name is required.',
            'contact_email.required' => 'Email is required.',
            'contact_subject.required' => 'Subject is required.',
            'contact_message.required' => 'Message is required.',
            // Fieldxxx.required => 'Fieldxxx is required.',
        ];
    }
}

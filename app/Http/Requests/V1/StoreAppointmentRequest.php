<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'App_name' => ['required' , 'string' , 'max:255'],
            'App_email' => ['required' , 'email' , 'max:255'],
            'date' => ['required' , 'date' , 'after:today'],
            'time' => ['required' , 'string'],
            'doctor_id' => ['required' , 'integer' , 'exists:doctors,id'],
            'department_id' => ['required' , 'integer' , 'exists:departments,id'],
            // Request 
        ];
    }

        public function messages(): array
    {
        return [
            'App_name.required' => 'Name is required.',
            'App_email' => 'Email is required.',
            'date' => 'Date is required.',
            'time' => 'Time is required.',
            'doctor_id' => 'Doctor is required.',
            'department_id' => 'Department is required.',
            // Fieldxxx.required => 'Fieldxxx is required.',
        ];
    }
}

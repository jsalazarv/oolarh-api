<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'names' => ['required', 'string', 'max:255'],
            'vacancy_id' => ['required', 'integer', 'max:255'],
            'first_surname' => ['required', 'string', 'max:255'],
            'second_surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                'unique:applicants,email'
            ],
            'cellphone' => [
                'required',
                'string',
                'max:255',
                'unique:applicants,cellphone'
            ],
            'psychometric_test' => [
                'required',
                'url',
                'max:255',
                'unique:applicants,psychometric_test'
            ],
            'resume' => ['required','file', 'mimes:pdf', 'max:5000'],
        ];
    }
}

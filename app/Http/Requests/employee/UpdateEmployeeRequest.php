<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
    public function rules()
    {
        return [
            'names' => ['required', 'string', 'max:255'],
            'first_surname' => ['required', 'string', 'max:255'],
            'second_surname' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'rfc' => ['required', 'string', 'max:255'],
            'ssn' => ['required', 'string', 'max:255'],
            'resume' => ['required','file', 'mimes:pdf', 'max:5000'],

            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                'unique:applicants,email'
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                'unique:applicants,cellphone'
            ],
            'cellphone' => [
                'required',
                'string',
                'max:255',
                'unique:applicants,cellphone'
            ],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'suburb' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'outdoor_number' => ['required', 'string', 'max:255'],
            'interior_number' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],

            'vacancy_id' => ['required', 'integer', 'max:255'],
            'psychometric_test' => [
                'required',
                'url',
                'max:255',
                'unique:applicants,psychometric_test'
            ],
            'salary' => ['required', 'string', 'max:255'],
        ];
    }
}

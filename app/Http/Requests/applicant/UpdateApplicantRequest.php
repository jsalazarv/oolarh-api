<?php

namespace App\Http\Requests\applicant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'names' => ['sometimes', 'string', 'max:255'],
            'vacancy' => ['sometimes', 'integer', 'max:255'],
            'first_surname' => ['sometimes', 'string', 'max:255'],
            'second_surname' => ['sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'email',
                'string',
                'max:255',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'cellphone' => [
                'sometimes',
                'string',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'psychometric_test' => [
                'sometimes',
                'url',
                'max:255',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'resume' => ['sometimes','file', 'mimes:pdf', 'max:5000'],
            'status' => ['sometimes', 'string', 'max:255']
        ];
    }
}

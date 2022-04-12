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
            'names' => ['required', 'string', 'max:255'],
            'vacancy' => ['required', 'integer', 'max:255'],
            'first_surname' => ['required', 'string', 'max:255'],
            'second_surname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'string',
                'max:255',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'cellphone' => [
                'required',
                'string',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'psychometric_test' => [
                'required',
                'url',
                'max:255',
                Rule::unique('applicants')->ignore(request()->route('id'))
            ],
            'resume' => ['file', 'mimes:pdf', 'max:5000'],
            'status' => ['required', 'string', 'max:255']
        ];
    }
}

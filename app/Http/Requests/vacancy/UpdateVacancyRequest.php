<?php

namespace App\Http\Requests\vacancy;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacancyRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
            'branch_office_id' => ['required', 'integer', 'max:255'],
            'department_id' => ['required', 'integer', 'max:255'],
            'job_id' => ['required', 'integer', 'max:255'],
        ];
    }
}

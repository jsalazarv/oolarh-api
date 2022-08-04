<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'first_surname' => $this->first_surname,
            'second_surname' => $this->second_surname,
            'fullName' => $this->names . ' ' . $this->first_surname . ' ' . $this->second_surname,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'rfc' => $this->rfc,
            'ssn' => $this->ssn,
            'resume' => new ResumeResource($this->whenLoaded('resume')),
            'contact' => new ContactResource($this->whenLoaded('contact')),
            'address' => new AddressResource($this->whenLoaded('address')),
            'vacancy' => new VacancyResource($this->whenLoaded('vacancy')),
            'psychometric_test' => $this->psychometric_test,
            'salary' => $this->salary,
            'employee_status' => $this->employee_status,
            'profile_status' => $this->profile_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

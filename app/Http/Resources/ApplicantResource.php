<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'names' => $this->names,
            'vacancy' => $this->vacancy,
            'first_surname' => $this->first_surname,
            'second_surname' => $this->second_surname,
            'email' => $this->email,
            'cellphone' => $this->cellphone,
            'psychometric_test' => $this->psychometric_test,
            'resume' => new ResumeResource($this->whenLoaded('resume')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

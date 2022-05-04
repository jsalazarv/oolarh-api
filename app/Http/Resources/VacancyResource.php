<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'salary' => $this->salary,
            'branch_office' => new BranchOfficeResource($this->whenLoaded('branchOffice')),
            'department' => new DepartmentResource($this->whenLoaded('department')),
            'job' => new JobResource($this->whenLoaded('job')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

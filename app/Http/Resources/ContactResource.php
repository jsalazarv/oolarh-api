<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'id'=> $this->id,
            'email' => $this->email,
            'phone' =>$this->phone,
            'cellphone' =>$this->cellphone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

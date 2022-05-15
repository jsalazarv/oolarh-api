<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'id' => $this->id,
            'country'=> $this->country,
            'state' => $this->state,
            'municipality' => $this->municipality,
            'suburb' => $this->suburb,
            'street' => $this->street,
            'outdoor_number' => $this->outdoor_number,
            'interior_number' => $this->interior_number,
            'postal_code' => $this->postal_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

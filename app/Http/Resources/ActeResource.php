<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActeResource extends JsonResource
{
    public static $wrap = false;

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
            'observation' => $this->observation, 
            'personnel_medical_id' => $this->personnel_medical_id,
            'hospitalisation_id' => $this->hospitalisation_id,
            'service_id' => $this->service_id,  
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
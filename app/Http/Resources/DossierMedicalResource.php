<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DossierMedicalResource extends JsonResource
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
            'groupe_sanguin' => $this->groupe_sanguin,
            'electrophorese' => $this->electrophorese,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),  
        ];
    }
}
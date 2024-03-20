<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SoinResource extends JsonResource
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
            'patient' => $this->patient,
            'observation' => $this->observation,
            'part_payee' => $this->part_payee,
            'facture_id' => $this->facture_id,
            'type_soin_id' => $this->type_soin_id,
            'service_id' => $this->service_id,
            'dossier_medical_id' => $this->dossier_medical_id,
            'personnel_medical_id' => $this->personnel_medical_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
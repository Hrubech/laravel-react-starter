<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'diagnostic' => $this->diagnostic,
            'motif' => $this->motif,
            'lieu' => $this->lieu,
            'prix' => $this->prix,
            'part_payee_par_patient' => $this->part_payee_par_patient,
            'etat' => $this->etat,
            'service_id' => $this->service_id,
            'dossier_medical_id' => $this->dossier_medical_id,
            'personnel_medical_id' => $this->personnel_medical_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),  
        ];
    }
}
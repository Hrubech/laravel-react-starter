<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactureResource extends JsonResource
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
            'reference' => $this->reference,
            'montant_total' => $this->montant_total, 
            'reduction_appliquee' => $this->reduction_appliquee,
            'pourcentage_reduction' => $this->pourcentage_reduction,
            'part_payee_assurance' => $this->part_payee_assurance,
            'part_payee_patient' => $this->part_payee_patient,
            'reste_a_payer' => $this->reste_a_payer,
            'etat' => $this->etat, 
            'consultation_id' => $this->consultation_id,
            'hospitalisation_id' => $this->hospitalisation_id,
            'bon_examen_id' => $this->bon_examen_id,
            'recu_id' => $this->recu_id,
            'assurance_id' => $this->assurance_id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),  
        ];
    }
}
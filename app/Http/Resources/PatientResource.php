<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'user_id' => $this->user_id,
            'fonction' => $this->fonction,
            'personne_a_contacter'=> $this->personne_a_contacter,
            'fonction_personne'=> $this->fonction_personne,
            'lien_parente'=> $this->lien_parente,
            'contact_personne'=> $this->contact_personne,
            'adresse_personne'=> $this->adresse_personne,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'assurances' => $this->assurances,  
        ];
    }
}

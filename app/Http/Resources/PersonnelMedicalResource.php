<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonnelMedicalResource extends JsonResource
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
            'nom' => $this->nom,
            'username' => $this->username,
            'prenom' => $this->prenom,
            'sexe' => $this->sexe,
            'date_de_naissance' => $this->date_de_naissance,
            'adresse' => $this->adresse,
            'contact' => $this->contact,
            'email' => $this->email,
            'mot_de_passe' => $this->mot_de_passe,
            'role_id' => $this->role_id,
            'service_id' => $this->service_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
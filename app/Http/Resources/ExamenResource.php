<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamenResource extends JsonResource
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
            'resultat' => $this->resultat,
            'prise_en_charge_structure' => $this->prise_en_charge_structure,
            'hospitalisation_id' => $this->hospitalisation_id,
            'bon_examen_id' => $this->bon_examen_id,
            'type_examen_id' => $this->type_examen_id, 
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), 
        ];
    }
}
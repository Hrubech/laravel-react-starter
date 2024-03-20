<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'medicament' => $this->medicament,
            'dose' => $this->dose,
            'nb_prise_par_jour' => $this->nb_prise_par_jour,
            'duree_traitement' => $this->duree_traitement,
            'ordonnance_id' => $this->ordonnance_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
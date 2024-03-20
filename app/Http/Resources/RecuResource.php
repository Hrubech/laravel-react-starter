<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecuResource extends JsonResource
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
            'montant' => $this->montant,
            'motif' => $this->motif,
            'lieu' => $this->lieu,
            'date_payment' => $this->date_payment,
            'facture_id' => $this->facture_id,
            'patient_id' => $this->patient_id,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
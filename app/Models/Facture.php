<?php

namespace App\Models;

use App\Enum\EtatFactureEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'montant_total',
        'reduction_appliquee',
        'pourcentage_reduction',
        'part_payee_assurance',
        'part_payee_patient',
        'reste_a_payer',
        'etat', 
        'consultation_id',
        'hospitalisation_id',
        'bon_examen_id',
        'recu_id',
        'assurance_id',
        'patient_id',
    ];

    protected $casts = [ 
        'etat' => EtatFactureEnum::class
    ];
}

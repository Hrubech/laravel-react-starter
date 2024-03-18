<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'observation',
        'part_payee',
        'date_entree',
        'date_sortie',
        'prix_chambre',
        'nb_jour',
        'nb_passage_medecin',
        'nb_passage_medecin_specialiste',
        'facture_id',
        'patient_id',
        'medecin_traitant_id',
        'chambre_id',
    ];
}

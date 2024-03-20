<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soin extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'observation',
        'part_payee',
        'facture_id',
        'type_soin_id',
        'service_id',
        'dossier_medical_id',
        'personnel_medical_id',
    ];
}

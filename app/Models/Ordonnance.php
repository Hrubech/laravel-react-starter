<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'service_id',
        'dossier_medical_id',
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function dossierMedical()
    {
        return $this->belongsTo(DossierMedical::class);
    }
}

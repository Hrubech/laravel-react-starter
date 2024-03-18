<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonExamen extends Model
{
    use HasFactory;

    protected $fillable = [
        'salle',
        'renseignement_clinique', 
        'consultation_id',
        'service_id',
        'dossier_medical_id',
    ]; 

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

    public function examens()
    {
        return $this->hasMany(Examen::class);
    }
}

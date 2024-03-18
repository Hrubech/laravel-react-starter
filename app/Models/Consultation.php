<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostic',
        'motif',
        'lieu',
        'prix',
        'part_payee_par_patient',
        'etat',
        'service_id',
        'dossier_medical_id',
        'personnel_medical_id',
    ];

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }

    public function bonExamen()
    {
        return $this->hasOne(BonExamen::class);
    }

    public function ordonnance()
    {
        return $this->hasOne(Ordonnance::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function dossierMedical()
    {
        return $this->belongsTo(DossierMedical::class);
    }

    public function personnelMedical()
    {
        return $this->belongsTo(PersonnelMedical::class);
    }

    public function symptomes()
    {
        return $this->hasMany(Symptome::class);
    } 
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DossierMedical extends Model
{
    use HasFactory;

    protected $table = 'dossier_medicals';

    protected $fillable = [
        'groupe_sanguin',
        'electrophorese', 
        'patient_id'
    ]; 

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function antecedents()
    {
        return $this->hasMany(Antecedent::class);
    }

    public function soins()
    {
        return $this->hasMany(Soin::class);
    }

    public function bonsExamens()
    {
        return $this->hasMany(BonExamen::class);
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }

    public function setAntecedentsAttribute($antecedents)
    {
        $this->antecedents()->delete();
        if ($antecedents) {
            foreach ($antecedents as $antecedent) {
                $this->antecedents()->create($antecedent);
            }
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
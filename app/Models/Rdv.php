<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'contact',
        'sexe',
        'date',
        'heure',
        'etat',
        'personnel_medical_id',
        'service_id',
    ];

    protected $dates = [
        'date', 
    ];

    public function personnelMedical()
    {
        return $this->belongsTo(PersonnelMedical::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acte extends Model
{
    use HasFactory;

    protected $fillable = [
        'observation', 
        'personnel_medical_id',
        'hospitalisation_id',
        'service_id',
    ];

    public function personnelMedical()
    {
        return $this->belongsTo(PersonnelMedical::class);
    }

    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'resultat',
        'prise_en_charge_structure',
        'hospitalisation_id',
        'bon_examen_id',
        'type_examen_id',
    ];

    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class);
    }

    public function bonExamen()
    {
        return $this->belongsTo(BonExamen::class);
    }

    public function typeExamen()
    {
        return $this->belongsTo(TypeExamen::class);
    }
}

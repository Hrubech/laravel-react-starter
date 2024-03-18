<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type'];

    public function dossierMedical()
    {
        return $this->belongsTo(DossierMedical::class);
    }
}

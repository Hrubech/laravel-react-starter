<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    protected $table = 'assurances';
    protected $fillable = ['nom', 'description', 'image', 'taux', 'date_creation', 'date_modification'];

    // Relations
    /*public function factures()
    {
        return $this->hasMany(Facture::class, 'assurance_id');
    }*/

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'assurance_patient', 'assurance_id', 'patient_id');
    } 
}
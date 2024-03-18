<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix_consultation'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function personnels()
    {
        return $this->hasMany(PersonnelMedical::class);
    }

    public function rdv()
    {
        return $this->hasMany(Rdv::class);
    }

    public function bonsExamens()
    {
        return $this->hasMany(BonExamen::class);
    }

    public function soins()
    {
        return $this->hasMany(Soin::class);
    }

    public function actes()
    {
        return $this->hasMany(Acte::class);
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }
}
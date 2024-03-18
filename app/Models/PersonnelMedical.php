<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'username',
        'prenom',
        'sexe',
        'date_de_naissance',
        'adresse',
        'contact',
        'email',
        'mot_de_passe',
        'role_id',
        'service_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function soins()
    {
        return $this->hasMany(Soin::class);
    }

    public function hospitalisations()
    {
        return $this->hasMany(Hospitalisation::class);
    }

    public function actes()
    {
        return $this->hasMany(Acte::class);
    }

    public function rdv()
    {
        return $this->hasMany(Rdv::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    //protected $fillable = ['lastname', 'firstname', 'birthdate', 'gender', 'address', 'phone'];

    protected $fillable = [
        'fonction',
        'personne_a_contacter',
        'fonction_personne',
        'lien_parente',
        'contact_personne',
        'adresse_personne',
        // Ajoutez les colonnes supplémentaires selon vos besoins
    ];

    /*public function dossierMedical()
    {
        return $this->hasOne(DossierMedical::class, 'patient_id');
    }*/

    public function assurances()
    {
        return $this->belongsToMany(Assurance::class, 'assurance_patient', 'patient_id', 'assurance_id');
    }

    /*public function factures()
    {
        return $this->hasMany(Facture::class, 'patient_id');
    }*/

    /*public function recus()
    {
        return $this->hasMany(Recu::class, 'patient_id');
    }*/
}
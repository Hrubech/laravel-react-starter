<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'motif',
        'lieu',
        'date_payment',
        'facture_id',
        'patient_id'
    ];

    protected $dates = ['date_payment'];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
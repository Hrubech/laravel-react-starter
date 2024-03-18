<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptome extends Model
{
    use HasFactory;

    protected $fillable = ['observation'];

    // Relation avec la consultation
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

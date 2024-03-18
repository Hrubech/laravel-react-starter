<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'numero',
        'type',
        'nb_lit',
        'prix',
    ];

    public function hospitalisations()
    {
        return $this->hasMany(Hospitalisation::class);
    }
}

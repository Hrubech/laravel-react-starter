<?php

namespace App\Models;

use App\Enum\AntecedentTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type'];

    protected $casts = [ 
        'type' => AntecedentTypeEnum::class
    ];

    public function dossierMedical()
    {
        return $this->belongsTo(DossierMedical::class);
    }
}

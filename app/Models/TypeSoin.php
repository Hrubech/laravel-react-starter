<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSoin extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix']; 

    public function soins()
    {
        return $this->hasMany(Soin::class);
    }
}

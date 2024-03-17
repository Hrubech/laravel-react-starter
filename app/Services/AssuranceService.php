<?php

namespace App\Services;

use App\Models\Assurance; 

class AssuranceService
{
    public function getAllAssurances()
    {
        return Assurance::orderBy('created_at', 'desc')->get();
    }

    public function getAssuranceById($id)
    {
        return Assurance::find($id);
    }

    public function createAssurance($data)
    {
        return Assurance::create($data);
    }

    public function updateAssurance($id, $data)
    {
        $assurance = Assurance::findOrFail($id);
        $assurance->update($data);
        return $assurance;
    }

    public function deleteAssurance($id)
    {
        $assurance = Assurance::findOrFail($id);
        $assurance->delete();
        return true;
    }

    public function count()
    {
        return Assurance::count();
    }
}
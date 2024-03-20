<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    public function getAllServices()
    {
        return Service::orderByDesc('created_at')->get();
    }

    public function getServiceById($id)
    {
        return Service::find($id);
    }

    public function createService(array $data)
    {
        return Service::create($data);
    }

    public function updateService($id, array $data)
    {
        $service = Service::find($id);
        if ($service) {
            $service->update($data);
            return $service;
        }
        return null;
    }

    public function deleteService($id)
    {
        $service = Service::find($id);
        if ($service) {
            return $service->delete();
        }
        return false;
    }

    public function count()
    {
        return Service::count();
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'city', 'state', 'zip_code', 'image_path',
    ];

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }

    public function leasetransactions()
    {
        return $this->hasMany(LeaseTransaction::class, 'tenant_id');
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
}

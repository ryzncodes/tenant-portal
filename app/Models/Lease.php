<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date', 'rent_amount', 'deposit_amount', 'property_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function leaseTransactions()
    {
        return $this->hasMany(LeaseTransaction::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function leaseDetail()
    {
        return $this->hasOne(LeaseDetail::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function propertyManager()
    {
        return $this->belongsTo(User::class, 'property_manager_id');
    }
}

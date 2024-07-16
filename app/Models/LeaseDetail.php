<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'bedrooms', 'bathrooms', 'furnished', 'square_feet',
    ];

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeaseTransaction;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;


class LeaseController extends Controller
{
    public function index()
    {
        $user = Auth::check() ? Auth::user() : null;

        return view('home', compact('user'));
    }

    public function availableLease(Property $property)
    {
        $leases = Lease::where('property_id', $property->id)
            ->whereNull('tenant_id')
            ->get();

        return view('leases.available', [
            'property' => $property,
            'leases' => $leases,
        ]);
    }
}

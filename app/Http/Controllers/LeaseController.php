<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeaseTransaction;
use Illuminate\Support\Facades\Auth;


class LeaseController extends Controller
{
    public function index()
    {
        $user = Auth::check() ? Auth::user() : null;

        return view('home', compact('user'));
    }
}

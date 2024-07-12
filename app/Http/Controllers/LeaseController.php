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
        $id = Auth::user()->id;
        $user = User::find($id)->first();
        // $leaseTransactions = Lease::where('tenant_id', $user->id);
        // fidn property id @ lease table


        return view('home', compact('user'));
    }
}

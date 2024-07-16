<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $maintReqs = $user->maintenanceRequests()->get();

        return view('maintenance.tenant.main', [
            'maintReqs' => $maintReqs,
            'userId' => $user->id,
        ]);
    }

    public function addMaintenanceReqPage()
    {
        $user = Auth::user();
        return view('maintenance.tenant.add', compact('user'));
    }

    public function addMaintenanceReq(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
            'lease_id' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'scheduled_time' => 'required|date',
        ]);


        $user = Auth::user();
        $maintenanceRequest = new MaintenanceRequest();
        $maintenanceRequest->user_id = $user->id;
        $maintenanceRequest->property_id = $request->property_id;
        $maintenanceRequest->lease_id = $request->lease_id;
        $maintenanceRequest->description = $request->description;
        $maintenanceRequest->status = $request->status;
        $maintenanceRequest->priority = $request->priority;
        $maintenanceRequest->scheduled_time = $request->scheduled_time;
        $maintenanceRequest->save();

        return redirect()->route('add.maintenance.page')
            ->with('success', 'Maintenance request added successfully.');
    }
}

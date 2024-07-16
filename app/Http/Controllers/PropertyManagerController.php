<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\LeaseDetail;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyManagerController extends Controller
{
    public function index()
    {
        return view('propertymanager.menu');
    }

    public function getCreatePropertyPage()
    {
        return view('propertymanager.propcreate');
    }

    public function createProperty(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zipcode' => 'required|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $destinationPath = public_path('images/properties');
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $imageName);
            $imagePath = 'images/properties/' . $imageName;
        }

        $property = new Property();
        $property->name = $validatedData['name'];
        $property->address = $validatedData['address'];
        $property->city = $validatedData['city'];
        $property->state = $validatedData['state'];
        $property->zip_code = $validatedData['zipcode'];
        $property->image_path = $imagePath;
        $property->save();

        return redirect()->route('createproppage')->with('success', 'Property Created Successfully');
    }

    public function getCreateLeasePage()
    {
        $properties = Property::all();
        return view('propertymanager.leasecreate', compact('properties'));
    }

    public function createLease(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'bedroom_amount' => 'required|numeric',
            'bathroom_amount' => 'required|numeric',
            'furnished' => 'required|in:fully,partially,unfurnished',
            'square_feet' => 'required|numeric',
            'rent_amount' => 'required|numeric',
            'deposit_amount' => 'required|numeric',
            'property_id' => 'required|exists:properties,id',
        ]);

        $lease = new Lease();
        $lease->start_date = $validatedData['start_date'];
        $lease->end_date = $validatedData['end_date'];
        $lease->rent_amount = $validatedData['rent_amount'];
        $lease->deposit_amount = $validatedData['deposit_amount'];
        $lease->property_id = $validatedData['property_id'];
        $lease->save();

        $leaseDetail = new LeaseDetail();
        $leaseDetail->lease_id = $lease->id;
        $leaseDetail->bedrooms = $validatedData['bedroom_amount'];
        $leaseDetail->bathrooms = $validatedData['bathroom_amount'];
        $leaseDetail->square_feet = $validatedData['square_feet'];
        $leaseDetail->furnished = $validatedData['furnished'];
        $leaseDetail->save();

        return redirect()->route('createleasepage')->with('success', 'Lease created successfully');
    }
}

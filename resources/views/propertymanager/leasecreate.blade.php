@extends('layout')

@section('title', 'Create Lease')

@section('content')
    <h1>LEASE CREATE PAGE</h1>
    <form action="{{ route('createlease') }}" method="POST">
        @csrf
        <div>
            <label>
                <input type="radio" name="has_tenants" value="1" {{ old('has_tenants') == '1' ? 'checked' : '' }}>
                With Tenants
            </label>
            <label>
                <input type="radio" name="has_tenants" value="0" {{ old('has_tenants') == '0' ? 'checked' : '' }}>
                Without Tenants
            </label>
        </div>
        <div id="dateInputs" style="display: none;">
            <div>
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
            </div>
            <div>
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
            </div>
        </div>
        <div>
            <label for="bedroom_amount">Number of Bedrooms:</label>
            <input type="number" id="bedroom_amount" name="bedroom_amount" value="{{ old('bedroom_amount') }}">
        </div>
        <div>
            <label for="bathroom_amount">Number of Bathrooms:</label>
            <input type="number" id="bathroom_amount" name="bathroom_amount" value="{{ old('bathroom_amount') }}">
        </div>
        <div>
            <label for="furnished">Furnished?</label>
            <select id="furnished" name="furnished">
                <option value="fully" {{ old('furnished') == 'fully' ? 'selected' : '' }}>Fully Furnished</option>
                <option value="partially" {{ old('furnished') == 'partially' ? 'selected' : '' }}>Partially Furnished
                </option>
                <option value="unfurnished" {{ old('furnished') == 'unfurnished' ? 'selected' : '' }}>Unfurnished</option>
            </select>
        </div>
        <div>
            <label for="square_feet">Square Feet:</label>
            <input type="number" id="square_feet" name="square_feet" value="{{ old('square_feet') }}">
        </div>
        <div>
            <label for="rent_amount">Rent Amount:</label>
            <input type="number" id="rent_amount" name="rent_amount" value="{{ old('rent_amount') }}">
        </div>
        <div>
            <label for="deposit_amount">Deposit Amount:</label>
            <input type="number" id="deposit_amount" name="deposit_amount" value="{{ old('deposit_amount') }}">
        </div>
        <div>
            <label for="property_id">Property Name:</label>
            <select id="property_id" name="property_id">
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create Lease</button>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hasTenantsRadios = document.querySelectorAll('input[name="has_tenants"]');
            const dateInputsDiv = document.getElementById('dateInputs');

            function toggleDateInputs() {
                if (hasTenantsRadios[0].checked) {
                    dateInputsDiv.style.display = 'block';
                } else {
                    dateInputsDiv.style.display = 'none';
                }
            }

            toggleDateInputs();

            hasTenantsRadios.forEach(function(radio) {
                radio.addEventListener('change', toggleDateInputs);
            });
        });
    </script>
@endsection

@extends('layout')

@section('title', 'Modify Leases')

@section('content')
    <h1>Modify Lease {{ $lease->id }}</h1>

    <form action="{{ route('lease.edit', $lease->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $lease->start_date) }}">
            @error('start_date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $lease->end_date) }}">
            @error('end_date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="rent_amount">Rent Amount:</label>
            <input type="text" id="rent_amount" name="rent_amount" value="{{ old('rent_amount', $lease->rent_amount) }}">
            @error('rent_amount')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="deposit_amount">Deposit Amount:</label>
            <input type="text" id="deposit_amount" name="deposit_amount"
                value="{{ old('deposit_amount', $lease->deposit_amount) }}">
            @error('deposit_amount')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="tenant_id">Tenant:</label>
            <select id="tenant_id" name="tenant_id">
                <option value="">None</option>
                @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->id }}" {{ $lease->tenant_id == $tenant->id ? 'selected' : '' }}>
                        {{ $tenant->name }}
                    </option>
                @endforeach
            </select>
            @error('tenant_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="property_id">Property:</label>
            <select id="property_id" name="property_id">
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}" {{ $lease->property_id == $property->id ? 'selected' : '' }}>
                        {{ $property->name }}
                    </option>
                @endforeach
            </select>
            @error('property_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Update Lease</button>
    </form>
@endsection

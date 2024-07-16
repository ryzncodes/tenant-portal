@extends('layout')

@section('title', 'Available Leases')

@section('content')
    <h1>Available Leases for {{ $property->name }}</h1>

    @foreach ($leases as $lease)
        <div class="lease-card">
            <h3>Lease {{ $lease->id }} Details</h3>
            <table>
                <tr>
                    <th>Rent Amount</th>
                    <td>{{ $lease->rent_amount }}</td>
                </tr>
                <tr>
                    <th>Deposit Amount</th>
                    <td>{{ $lease->deposit_amount }}</td>
                </tr>
                @if ($lease->leaseDetail)
                    <tr>
                        <th>Bedrooms</th>
                        <td>{{ $lease->leaseDetail->bedrooms }}</td>
                    </tr>
                    <tr>
                        <th>Bathrooms</th>
                        <td>{{ $lease->leaseDetail->bathrooms }}</td>
                    </tr>
                    <tr>
                        <th>Furnished</th>
                        <td>{{ ucfirst($lease->leaseDetail->furnished) }}</td>
                    </tr>
                    <tr>
                        <th>Square Feet</th>
                        <td>{{ $lease->leaseDetail->square_feet }}</td>
                    </tr>
                @else
                    <tr>
                        <th colspan="2">No lease details available.</th>
                    </tr>
                @endif
            </table>
        </div>
    @endforeach
@endsection

@extends('layout')

@section('title', 'Maintenance Request')

@section('content')
    <h1>Maintenance Request Page</h1>
    <button>
        <a href="{{ route('add.maintenance.page') }}">Create a Maintenance Request</a>
    </button>
    @if ($maintReqs->isEmpty())
        <p>No maintenance requests found.</p>
    @else
        <table class="maintenance-table">
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Lease ID</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Scheduled Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maintReqs as $request)
                    <tr>
                        <td>{{ $request->property->name }}</td>
                        <td>{{ $request->lease_id }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ $request->status }}</td>
                        <td>{{ $request->priority }}</td>
                        <td>{{ $request->schedule_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection

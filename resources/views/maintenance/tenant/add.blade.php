@extends('layout')

@section('title', 'Create Maintenance Request')

@section('content')
    <h1>Create Maintenance Request</h1>
    <form action="{{ route('add.maintenance') }}" method="POST">
        @csrf

        <div>
            <label for="property_id">Property ID:</label>
            <input type="text" id="property_id" name="property_id" value="{{ old('property_id') }}">
            @error('property_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="lease_id">Lease ID:</label>
            <input type="text" id="lease_id" name="lease_id" value="{{ old('lease_id') }}">
            @error('lease_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="{{ old('status') }}">
            @error('status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="priority">Priority:</label>
            <input type="text" id="priority" name="priority" value="{{ old('priority') }}">
            @error('priority')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="schedule_time">Schedule Time:</label>
            <input type="datetime-local" id="schedule_time" name="schedule_time" value="{{ old('schedule_time') }}">
            @error('schedule_time')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection

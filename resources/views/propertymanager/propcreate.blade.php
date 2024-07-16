@extends('layout')

@section('title', 'Create Property')

@section('content')
    <h1>PROP CREATE PAGE</h1>
    <form action="{{ route('createproperty') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ old('city') }}">
        </div>
        <div>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="{{ old('state') }}">
        </div>
        <div>
            <label for="zipcode">Zipcode:</label>
            <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}">
        </div>
        <div>
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Create Property</button>
    </form>
@endsection

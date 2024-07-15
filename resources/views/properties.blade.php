@extends('layout')

@section('title', 'Properties')

@section('content')
    <div class="wrapper">
        <div class="title-text" style="margin-bottom: 30px">
            <h1>Properties Available</h1>
            <p>Find Your Dream Home</p>
        </div>
        <div class="prop-wrapper">
            @foreach ($properties as $prop)
                <div class="prop-card">
                    <h3>{{ $prop->name }}</h3>
                    <div class="img-wrapper">
                        <img src="{{ asset($prop->image_path) }}" alt="Property Image">
                    </div>
                    <div class="prop-details">
                        <p>{{ $prop->address }}</p>
                        <p>{{ $prop->city }}</p>
                        <p>{{ $prop->state }}</p>
                    </div>
                    <a href="{{ route('properties.available-leases', ['property' => $prop->id]) }}"
                        class="btn btn-primary">Available Leases</a>
                </div>
            @endforeach
        </div>

    </div>
@endsection

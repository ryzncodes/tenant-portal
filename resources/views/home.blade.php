@extends('layout')

@section('title', 'Main Page')

@section('content')
    <div>
        @auth
            @if ($user->role === 'tenant')
                <div class="wrapper">
                    <div class="title-text">
                        <h1>Welcome back,
                            <span>{{ $user->name }}.</span>
                        </h1>
                        <p>Here's what you've missed.</p>
                    </div>
                    <div class="overview">
                        <div class="card-wrapper">
                            <div class="top-card">
                                <h2>Lease Information</h2>
                            </div>
                            @foreach ($user->leases as $key => $lease)
                                <div class="bottom-card">
                                    <p>Property Name: {{ $lease->property->name }}</p>
                                    <p>Starting Date: START_DATE</p>
                                    <p>End Date: END_DATE</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-wrapper">
                            <div class="top-card">
                                <h2>Pay Rent & Utilities</h2>
                            </div>
                            <div class="bottom-card">
                                <p>test</p>
                                <p>test</p>
                                <p>test</p>
                                <p>test</p>
                            </div>
                        </div>
                        <div class="card-wrapper">
                            <div class="top-card">
                                <h2>Maintainence Request</h2>
                            </div>
                            <div class="bottom-card">
                                <p>test</p>
                                <p>test</p>
                                <p>test</p>
                                <p>test</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-text">
                        <h3>Featured Properties
                        </h3>
                        <p>Discover new properties available for lease.</p>
                    </div>
                    <div class="featured-wrapper">
                        <div class="featured-left">
                            <div class="imgwrapper"></div>
                        </div>
                        <div class="featured-right"></div>
                    </div>
                </div>
            @endif
        @else
            <p>Welcome, Guest</p>
        @endauth
    </div>
@endsection

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
                    @if ($user->leases->isEmpty())
                        <div class="overview-empty">
                            <div class="card-wrapper">
                                <p>Haven't found a house to lease yet? Let's start by finding the perfect home for you.</p>
                                <button>Explore Here</button>
                            </div>
                        </div>
                    @else
                        <div class="overview">
                            <div class="card-wrapper">
                                <div class="top-card">
                                    <h2>Lease Information</h2>
                                </div>
                                @if ($user->leases->isNotEmpty())
                                    @foreach ($user->leases as $key => $lease)
                                        <div class="bottom-card">
                                            <p>Property Name: {{ $lease->property->name }}</p>
                                            <p>Starting Date: {{ $lease->start_date }}</p>
                                            <p>End Date: {{ $lease->end_date }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No lease information available.</p>
                                @endif
                            </div>
                            <div class="card-wrapper">
                                <div class="top-card">
                                    <h2>Pay Rent & Utilities</h2>
                                </div>
                                @if ($user->leases->isNotEmpty())
                                    @foreach ($user->leases as $lease)
                                        @foreach ($lease->leaseTransactions as $transaction)
                                            <div class="bottom-card">
                                                <p>Amount Due: {{ $transaction->amount_paid }}</p>
                                                <p>Due Date: {{ $transaction->transaction_date }}</p>
                                                <p>Status: {{ $transaction->payment_status }}</p>
                                                <button>Pay Now</button>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    <p>No transactions available.</p>
                                @endif
                            </div>
                            <div class="card-wrapper">
                                <div class="top-card">
                                    <h2>Maintainence Request</h2>
                                </div>
                                @if ($user->leases->isNotEmpty())
                                    @foreach ($user->leases as $key => $lease)
                                        @if ($lease->maintenanceRequests->isNotEmpty())
                                            @foreach ($lease->maintenanceRequests as $request)
                                                <div class="bottom-card">
                                                    <p>Description: {{ $request->description }}</p>
                                                    <p>Status: {{ $request->status }}</p>
                                                    <p>Priority: {{ $request->priority }}</p>
                                                    <p>Scheduled Time: {{ $request->scheduled_time }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No maintenance requests found for this lease.</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p>No maintenance request available.</p>
                                @endif
                            </div>
                        </div>
                    @endif
                    <section id="featured">
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
                    </section>
                </div>
            @endif
        @else
            <p>Welcome, Guest</p>
        @endauth
    </div>
@endsection

@extends('layout')

@section('title', 'Properties & Leases')

@section('content')

    <section class="wrapper">
        <div class="container">
            <div class="prop-section">
                <h2>Properties</h2>
                <div class="summary-analytics">
                    <div>
                        <p>Properties Owned</p>
                        <p>NUMBER_PROP</p>
                    </div>
                    <div>
                        <p>Total Revenue</p>
                        <p>TOTAL_PAYMENT_STATUS_PAID</p>
                    </div>
                </div>
                <div>
                    <button>
                        <a href="{{ route('createproppage') }}">
                            Create A Property
                        </a>
                    </button>
                </div>
            </div>
            <div class="lease-section">
                <h2>Leases</h2>
                <div class="summary-analytics">
                    <div>
                        <p>Total Leases</p>
                        <p>{{ $propertyManager->leasesManager->count() }}</p>
                    </div>
                    <div>
                        <p>Occupied Leases</p>
                        <p>{{ $propertyManager->leasesManager->whereNotNull('tenant_id')->count() }}</p>
                    </div>
                    <div>
                        <p>Free Leases</p>
                        <p>{{ $propertyManager->leasesManager->whereNull('tenant_id')->count() }}</p>
                    </div>
                </div>
                <div>
                    <button>
                        <a href="{{ route('manageleasepage') }}">
                            Manage Leases
                        </a>
                    </button>
                    <button>
                        <a href="{{ route('createleasepage') }}">
                            Create A Lease
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

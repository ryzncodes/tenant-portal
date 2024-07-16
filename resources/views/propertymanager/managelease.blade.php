@extends('layout')

@section('title', 'Manage Leases')

@section('content')
    <h1>LEASE MANAGE PAGE</h1>
    <button id="showAllBtn">Show All</button>
    <button id="showWithTenantsBtn">Show With Tenants</button>
    <button id="showWithoutTenantsBtn">Show Without Tenants</button>
    @if ($leases->isEmpty())
        <p>No leases found.</p>
    @else
        <table class="leases-table">
            <thead>
                <tr>
                    <th>Lease ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Rent Amount (RM)</th>
                    <th>Deposit Amount (RM)</th>
                    <th>Property Name</th>
                    <th>Tenant Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leases as $lease)
                    <tr class="clickable-row" data-href="{{ route('lease.editpage', $lease->id) }}">
                        <td>{{ $lease->id }}</td>
                        <td>{{ $lease->start_date ?? 'N/A' }}</td>
                        <td>{{ $lease->end_date ?? 'N/A' }}</td>
                        <td>{{ $lease->rent_amount }}</td>
                        <td>{{ $lease->deposit_amount }}</td>
                        <td>{{ $lease->property->name }}</td>
                        <td>{{ $lease->tenant->name ?? 'No Tenant' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showAllBtn = document.getElementById('showAllBtn');
            const showWithTenantsBtn = document.getElementById('showWithTenantsBtn');
            const showWithoutTenantsBtn = document.getElementById('showWithoutTenantsBtn');
            const table = document.querySelector('.leases-table tbody');
            const rows = table.querySelectorAll('tr');

            showAllBtn.addEventListener('click', function() {
                rows.forEach(row => {
                    row.style.display = '';
                });
            });

            showWithTenantsBtn.addEventListener('click', function() {
                rows.forEach(row => {
                    const tenantCell = row.querySelector('td:last-child');
                    row.style.display = tenantCell.textContent.trim() !== 'No Tenant' ? '' : 'none';
                });
            });

            showWithoutTenantsBtn.addEventListener('click', function() {
                rows.forEach(row => {
                    const tenantCell = row.querySelector('td:last-child');
                    row.style.display = tenantCell.textContent.trim() === 'No Tenant' ? '' : 'none';
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.clickable-row');

            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const url = this.dataset.href;
                    if (url) {
                        window.location.href = url; // Navigate to the specified URL
                    }
                });
            });
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', 'Order Data')

@push('style')
<!-- CSS Libraries -->
{{-- <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Orders Items Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Orders Items Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-hover table">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                    </thead>
                                    <tbody>
                                        @foreach($orderitems as $orderitem)
                                        @if($orderitem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $orderitem->order_id }}</td>
                                            <td>{{ $orderitem->product_id }}</td>
                                            <td>{{ $orderitem->quantity }}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>No Data</td>
                                            <td></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $orderitems->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

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
            <h1>Orders Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Orders Data</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table-hover table">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Costumer</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status Pembayaran</th>
                                        <th scope="col">Alamat</th>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        @if($order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->seller_id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            @if($order->payment_status==='1')
                                            <td>Success</td>
                                            @elseif($order->payment_status==='2')
                                            <td>Pending</td>
                                            @elseif($order->payment_status==='3')
                                            <td>Failed</td>
                                            @else
                                            <td>Canceled</td>
                                            @endif
                                            <td>{{ $order->delivery_address }}</td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>No Data</td>
                                            <td></td>
                                            <td></td>
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
                                        {{ $orders->links() }}
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

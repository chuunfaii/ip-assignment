<!-- Author:    Quah Khai Gene -->

@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/my-sales.css') }}" />

@endsection

@section('content')

<div class="container mb-3 h-100">
    <div class="mx-auto mt-5">
        <div class="d-flex justify-content-center align-items-center mb-5">
            <h1 class="navbar-brand fw-bold p-0 m-0">My Sales</h1>
        </div>
        @if ($sales_exist == true)
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Artwork Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal Price</th>
                        <th>Ordered At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_items as $order_item)
                    <tr>
                        <td>{{ $order_item->order_id }}</td>
                        <td>{{ $order_item->artwork_name }}</td>
                        <td>{{ $order_item->quantity }}</td>
                        <td>$ {{ number_format($order_item->price, 2) }}</td>
                        <td>$ {{ number_format($order_item->subtotal, 2) }}</td>
                        <td>{{ $order_item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
            <h1 class="display-6 mb-5">Your Sales is empty right now.</h1>
        </div>
        @endif
    </div>
</div>

@endsection
@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/mySales.css') }}" />

@endsection

@section('content')

<div class="container mb-3 h-100">
    <div class="mx-auto mt-5">
        <div class="d-flex justify-content-center align-items-center mb-5">
            <h1 class="navbar-brand fw-bold p-0 m-0">Order History</h1>
        </div>
        <div class="input-group w-50 mx-auto mb-5">
            <div class="input-group">
                <input id="txtSearch" class="form-control py-2" placeholder="Enter order id here..." />
                <button id="btnSearch" class="btn btn-secondary text-muted">Search</button>
            </div>
        </div>
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
                    <tr>
                        <td>1</td>
                        <td>Artwork 1</td>
                        <td>1</td>
                        <td>$ 999.00</td>
                        <td>$ 999.00</td>
                        <td>6/2/2022 10:35:06 PM</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Artwork 1</td>
                        <td>1</td>
                        <td>$ 999.00</td>
                        <td>$ 999.00</td>
                        <td>6/2/2022 10:35:06 PM</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Artwork 1</td>
                        <td>1</td>
                        <td>$ 999.00</td>
                        <td>$ 999.00</td>
                        <td>6/2/2022 10:35:06 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
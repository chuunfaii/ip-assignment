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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

@endsection



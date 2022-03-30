@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
@endsection

@section('content')
    <main class="h-100 mx-auto my-5 d-flex">
        <!-- <%--
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-6 mb-5">You must be logged in to view your cart.</h1>
            <a href="Login.aspx" class="btn btn-primary mt-3 py-3 px-4">Login Here</a>
        </div>
        --%> -->

        <div class="d-flex flex-column justify-content-between align-items-center">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="display-4">Your Cart</h1>
            </div>
            <div class="d-flex flex-column h-100 justify-content-center align-items-center mb-5">
                <h1 class="display-6 mb-5">Your cart is empty right now.</h1>
                <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artwork</a>
            </div>
        </div>
    </main>
@endsection

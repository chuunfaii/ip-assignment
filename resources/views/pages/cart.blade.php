@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}" />
@endsection

@section('content')
<div style="flex-grow: 1;">
        <div class="container m-auto h-100 position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="navbar-brand fw-bold p-0 php m-0 mt-5">Your Cart</h1>
            </div>
            @if($cart != ''|| $cart != null)
                @foreach($cart as $c)
                <div class="row my-5" id="3">
                    <span id="lblArtworkId" style="display: none;">1</span>
                    <div class="col-2">
                        <div class="d-flex justify-content-center">
                            <a href="./">
                                <img src="https://i.pinimg.com/564x/26/cf/3c/26cf3c80b7b5923f89fba8fe140dd660.jpg" alt="" class="card-img-top" style="max-height: 8rem;">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <span>
                                <a href="./" class="text-decoration-none text-muted fs-4">
                                    Construction in Red, Blue & Yellow Drawing
                                </a>
                            </span>
                            <hr>
                            <p class="m-0">Artist: Karin White</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <span class="fw-bold">$ 1120.00</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-items-center justify-content-between">
                            <button id="btnRemove" class="btn btn-outline-danger">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <br><br><br><br>
                <div class="d-flex flex-column justify-content-between align-items-center">
                    <div class="d-flex flex-column h-100 justify-content-center align-items-center mb-5">
                        <h1 class="display-6 mb-5">Your cart is empty right now.</h1>
                        <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artwork</a>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

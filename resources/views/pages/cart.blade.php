@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
@endsection

@section('content')
    <main class="h-100 mx-auto my-5 d-flex">
        @if($cart != null)
            @foreach($cart as $c)
            <div class="row my-5" id="1">
                <span id="lblArtworkId" style="display: none;">1</span>
                    <div class="col-2">
                        <div class="d-flex justify-content-center">
                            <a href="./">
                                <img src="" alt="" class="card-img-top" style="max-height: 8rem;">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <span>
                                <a href="./" class="text-decoration-none text-muted fs-4">
                                    ee
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
                            <button id="btnCart" class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="d-flex flex-column justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="display-4">Your Cart</h1>
                </div>
                <div class="d-flex flex-column h-100 justify-content-center align-items-center mb-5">
                    <h1 class="display-6 mb-5">Your cart is empty right now.</h1>
                    <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artwork</a>
                </div>
            </div>
        @endif
    </main>
@endsection

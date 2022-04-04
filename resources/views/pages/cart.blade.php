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
        @if($carts->count() > 0)
            <div class="row mt-5 mb-5">
                <div class="col-2">
                </div>
                <div class="col-6">
                    <span class="fs-5 text-muted">Artwork</span>
                </div>
                <div class="col-1">
                    <span class="fs-5 text-muted">Quantity</span>
                </div>
                <div class="col-2 d-flex justify-content-start ps-5">
                    <span class="fs-5 text-muted">Subtotal Price</span>
                </div>
                <div class="col-1">
                </div>
            </div>
            @foreach($carts as $cart)
                <form action="{{ url('/update-cart') }}" method="POST">
                    @csrf
                    <div class="item row mb-5">
                        <div class="col-2">
                            <div class="d-flex justify-content-center">
                                <img style="max-height: 8rem;" src="{{ asset('upload/artworks/' . $cart->artwork->image_url) }}" class="card-img-top">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-100 d-flex flex-column justify-content-between">
                                <span class="text-decoration-none text-muted fs-4">
                                    {{ $cart->artwork->name }}
                                </span>
                                <hr />
                                <p class="m-0">Artist: {{ $cart->artwork->artist->presentFullName() }}</p>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <input name='quantity' class="form-control" type='number' min='1' max='99' value="{{ $cart->quantity }}" required />
                            </div>
                        </div>
                        <div class="col-2 ps-5">
                            <div class="h-100 d-flex align-items-center justify-content-start">
                                <span class="fw-bold">$ {{ number_format($cart->subtotal(), 2) }}</span>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                <button class="btn btn-outline-danger" type="submit" name="action" value="remove">Remove</button>
                                <button class="btn btn-primary ms-1" type="submit" name="action" value="update">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
            <div class="row mb-5">
                <div class="col-2">
                </div>
                <div class="col-6">
                </div>
                <div class="col-1">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <span class="fw-bold text-muted">Total Price:</span>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-start ps-5">
                    <span class="fs-4 fw-bold">$ {{ number_format($total_price, 2) }}</span>
                </div>
            </div>
            <div class="container d-flex align-items-center justify-content-between mb-5">
                <a class="fs-5 text-muted text-decoration-none" href="{{ url('/artworks') }}">
                    <i class="bi bi-caret-left-fill"></i> Back to Artworks
                </a>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary py-3 px-4">
                        Checkout with Stripe
                    </button>
                </form>
            </div>
        @else
            <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
                <h1 class="display-6 mb-5">Your cart is empty right now.</h1>
                <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artworks</a>
            </div>
        @endif
    </div>
</div>

@endsection

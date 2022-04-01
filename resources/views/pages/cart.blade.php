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
            @if($cart->count() > 0)
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
                @foreach($cart as $c)
                <form action="{{ url('/remove-cart') }}" id="cartForm" method="POST">
                    @csrf
                    <div class="item row mb-5" id="">
                        <span id="lblArtworkId" runat="server" style="display: none;"></span>
                        <div class="col-2">
                        <div class="d-flex justify-content-center">
                            <img style="max-height: 8rem;" src="{{ asset('upload/artworks/'.$c->artworks->image_url) }}" class="card-img-top">
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <span>
                                <span class="text-decoration-none text-muted fs-4">
                                    {{ $c->artworks->name }}
                                </span>
                            </span>
                            <hr />
                            <p class="m-0">Artist: {{ $c->artworks->artist->presentFullName() }}</p>
                        </div>
                        </div>
                        <div class="col-1">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <input id='quantity' name='quantity' class="form-control" type='number' min='1' max='99' value="{{ $c->quantity }}"/>
                        </div>
                        </div>
                        <div class="col-2 ps-5">
                        <div class="h-100 d-flex align-items-center justify-content-start">
                            <span class="fw-bold">$ {{ $c->artworks->price }}</span>
                        </div>
                        </div>
                        <div class="col-1">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <input type="hidden" name="removeId" value="{{ $c->id }}">
                                <button id="removeBtn" class="btn btn-outline-danger" type="submit" name="removeBtn">Remove</button>
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
                        <span class="fs-4 fw-bold">$ 1000</span>
                    </div>
                </div>
                <div class="container d-flex align-items-center justify-content-between mb-5">
                    <a class="fs-5 text-muted text-decoration-none" href="{{ url('/artworks') }}">
                        <i class="bi bi-caret-left-fill"></i> Back to Artworks
                    </a>
                    <button id="checkout" name="checkout" class="btn btn-primary py-3 px-4">Checkout with Stripe</button>
                </div>
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

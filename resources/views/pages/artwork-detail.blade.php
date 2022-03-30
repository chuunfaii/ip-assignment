@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artwork-detail.css') }}" />

@endsection

@section('content')

<form action="" method="POST">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container d-flex" style="min-height: 500px;">
        <div class="d-flex justify-content-center" style="flex: 1;">
            <img style="max-width: 80%;" src="{{ asset('upload/artworks/' . $artwork->image_url) }}" />
        </div>
        <div class="h-105" style="flex: 1;">
            <div class="h-75">
                <div class="mb-5">
                    <h2 class="display-5 mb-4">
                        {{ $artwork->name }}
                    </h2>
                    <p class="text-muted">
                        {{ $artwork->description }}
                    </p>
                </div>
                <input type="hidden" value="{{ $artwork->id }}" name="artwork_id">

                <div class="d-flex justify-content-between mb-5">
                    <span class="text-muted">
                        {{ $category->name }}
                    </span>
                    <span class="text-muted fw-bold">
                        {{ $artist->first_name}}
                        {{ $artist->last_name}}
                    </span>
                </div>

                <div>
                    <p class="fw-bold">
                        {{ $artwork->quantity }} Quantity Available
                    </p>

                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <span class="me-3">Quantity:</span>
                            <input id='txtQuantity' name="quantity" type='number' min=1 value=1 />

                        </div>

                        <span class="display-6">$ {{ $artwork->price}} </span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-end h-25">
                <a class="fs-5 text-muted text-decoration-none" href="{{ route('artworks') }}">
                    <i class="bi bi-caret-left-fill"></i> Back to Artworks
                </a>
                
                <div>
                    <button id="btnWishlist" class="btn btn-outline-secondary px-4 py-3 me-3 "
                        name="action" value="wishlist">
                        <i class="bi bi-heart-fill"></i>
                    </button>
                    <button id="btnCart" class="btn btn-primary px-5 py-3" name="action" value="cart">Add to
                        Cart</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
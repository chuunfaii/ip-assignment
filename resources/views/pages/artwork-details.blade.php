@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artwork-details.css') }}" />

@endsection

@section('content')

<form class="m-auto" action="{{ route('wishlist-cart', $artwork->id) }}" method="POST">
    @csrf
    <div class="container d-flex" style="min-height: 500px;"> 
        <div class="d-flex justify-content-center" style="flex: 1;">
            <img style="max-width: 70%;" src="{{ asset('upload/artworks/' . $artwork->image_url) }}" />
        </div>
        <div style="flex: 1;">
            <div class="h-75">
                <div class="mb-5">
                    <h2 class="display-5 mb-4">
                        {{ $artwork->name }}
                    </h2>
                    <p class="text-muted">
                        {{ $artwork->description }}
                    </p>
                </div>
                <div class="d-flex justify-content-between mb-5">
                    <span class="text-muted">
                        {{ $artwork->category->name }}
                    </span>
                    <span class="text-muted fw-bold">
                        {{ $artwork->artist->presentFullName() }}
                    </span>
                </div>
                <div>
                    <p class="fw-bold">
                        {{ $artwork->quantity }} stock(s) available
                    </p>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <span class="me-3">Quantity:</span>
                            <input name="quantity" type='number' min='1' max='{{ $artwork->quantity }}' value='1' />
                            @error('quantity')
                                <p class="m-0 mt-3 error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-auto display-6">{{ $artwork->presentPrice() }}</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end h-25">
                <a class="fs-5 text-muted text-decoration-none" href="{{ route('artworks') }}">
                    <i class="bi bi-caret-left-fill"></i> Back to Artworks
                </a>
                <div>
                    <button type="submit" class="btn btn-outline-secondary px-4 py-3 me-3" name="action" value="wishlist">
                        <i class="bi bi-heart-fill"></i>
                    </button>
                    <button type="submit" class="btn btn-primary px-5 py-3" name="action" value="cart">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
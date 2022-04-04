@extends('layouts.app')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}" />
    
@endsection

@section('content')

<div style="flex-grow: 1;">
    <div class="container m-auto h-100 position-relative">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="navbar-brand fw-bold p-0 php m-0 mt-5">Your Wishlist</h1>
        </div>
        @if($wishlists->count() > 0)
            @foreach ($wishlists as $wishlist)
                <form action="{{ url('/update-wishlist') }}" method="POST">
                    @csrf
                    <div class="row my-5">
                        <div class="col-2 ">
                            <div class="d-flex justify-content-center">
                                <a href="/artwork/{{ $wishlist->artwork->id }}">
                                    <img src="{{ asset('upload/artworks/' . $wishlist->artwork->image_url) }}" alt="" class="card-img-top" style="max-height: 8rem;">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="h-100 d-flex flex-column justify-content-between">
                                <span>
                                    <a href="/artwork/{{ $wishlist->artwork->id }}" class="text-decoration-none text-muted fs-4">
                                        {{ $wishlist->artwork->name }}
                                    </a>
                                </span>
                                <hr>
                                <p class="m-0">{{ $wishlist->artwork->artist->presentFullName() }}</p>
                            </div>
                        </div>
                        <div class="col-2 ">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <span class="fw-bold">{{ $wishlist->artwork->presentPrice() }}</span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex align-items-center justify-content-between">
                                <input type="hidden" name="artwork_id" value="{{ $wishlist->artwork_id }}">
                                <input type="hidden" name="user_id" value="{{ $wishlist->user_id }}">
                                <button class="btn btn-outline-danger" name="action" value="remove">Remove</button>
                                <button class="btn btn-primary" name="action" value="add-to-cart" >Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @else
            <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
                <h1 class="display-6 mb-5">Your wishlist is empty right now.</h1>
                <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artworks</a>
            </div>
        @endif
    </div>
</div>

@endsection

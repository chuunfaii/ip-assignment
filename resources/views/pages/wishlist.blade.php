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
            @if($wishlist->count() > 0)
                @foreach ($wishlist as $w)
                <form action="{{ url('/update-wishlist') }}" id="wishlistForm" method="POST">
                    @csrf
                <div class="row my-5" id="1">
                    <span id="lblArtworkId" style="display: none;">1</span>
                    <div class="col-2 ">
                        <div class="d-flex justify-content-center">
                            <a href="/artwork/{{ $w->artworks->id }}">
                                <img src="{{ asset('upload/artworks/' . $w->artworks->image_url) }}" alt="" class="card-img-top" style="max-height: 8rem;">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="h-100 d-flex flex-column justify-content-between">
                            <span>
                                <a href="./" class="text-decoration-none text-muted fs-4">
                                    {{ $w->artworks->name }}
                                </a>
                            </span>
                            <hr>
                            <p class="m-0">{{  $w->artworks->artist->presentFullName() }}</p>
                        </div>
                    </div>
                    <div class="col-2 ">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <span class="fw-bold">{{ $w->artworks->presentPrice()}}</span>
                            
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="h-100 d-flex align-items-center justify-content-between">
                            <input type="hidden" name="actionId" value="{{ $w->artwork_id }}">
                            <input type="hidden" name="testId" value="{{ $w->user_id }}">
                            <button id="btnRemove" class="btn btn-outline-danger" name="wishlistBtn" value="remove">Remove</button>
                            <button id="btnCart" class="btn btn-primary" name="wishlistBtn" value="add-to-cart" >Add to Cart</button>
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

                    {{-- <div class="row mb-5">
                        <div class="col-2">
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-1">
                            <div class="h-100 d-flex align-items-center justify-content-end">
                                <span class="fw-bold text-muted">Total Price:</span>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-start ps-3">
                            <span class="fs-4 fw-bold">$ 100000</span>
                        </div>
                    </div>
               --}}












                <!-- Empty Wishlist -->
            {{-- <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
                <h1 class="display-6 mb-5">Your wishlist is empty right now.</h1>
                <a href="{{ url('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artworks</a>
            </div> --}}

        </div>
    </div>


@endsection

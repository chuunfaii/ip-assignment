<!-- Author:    Quah Khai Gene -->

@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artist-profile.css') }}" />

@endsection


@section('content')

<div id="content" class="content content-full-width">
    <div class="profile">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content container">
                @if($artist->image_url != null)
                <img class="profile-header-img" src="{{ asset('upload/artists/'.$artist->image_url) }}" />
                @else
                <img class="profile-header-img" src="https://i.pinimg.com/564x/26/cf/3c/26cf3c80b7b5923f89fba8fe140dd660.jpg" />
                @endif
                <div class="profile-header-info">
                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <h4 class="mb-4 fw-bold">
                                <Label>{{ $artist->presentFullName() }}
                            </h4>
                            <p class="mb-5">
                                <Label>{{ $artist->email }}</Label>
                            </p>
                        </div>
                        <div class="w-50">
                            <h5 class="mb-4 fw-bold">Bio</h5>
                            <p>
                                <label>{{ $artist->bio }}</label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="d-flex justify-content-center align-items-center mb-4">
        <h1 class="navbar-brand fw-bold p-0 m-0">All Artworks</h1>
    </div>
    <hr />
    <div class="row row-cols-4">
        @foreach($artworks as $artwork)
        <div class="card col ms-5 mb-5 p-0 mt-3" style="width: 21% !important;">
            <a href="/artwork/{{ $artwork->id }}">
                <img src="{{ asset('upload/artworks/' . $artwork->image_url) }}" class="card-img-top" style="height: 250px;" />
            </a>
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <a href="/artwork/{{ $artwork->id }}">
                        <h5 class="card-title">{{ $artwork->name }}</h5>
                    </a>
                    <p class="card-text text-muted">{{ $artwork->description }}</p>
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <p class="text-muted">Quantity: {{ $artwork->quantity }}</p>
                    <p class="fw-bold">{{ $artwork->presentPrice() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endsection
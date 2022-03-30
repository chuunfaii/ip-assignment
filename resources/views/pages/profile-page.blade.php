@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/profile-page.css') }}" />

@endsection


@section('content')

<div id="content" class="content content-full-width">
    <div class="profile">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content container">
                @if(auth()->user()->image_url != '')
                    <img id="Image1" class="profile-header-img" src="{{ asset('upload/artists/'.auth()->user()->image_url) }}"/>
                @else
                    <img id="Image1" class="profile-header-img" src="https://i.pinimg.com/564x/26/cf/3c/26cf3c80b7b5923f89fba8fe140dd660.jpg"/>
                @endif
                <div class="profile-header-info">
                    <div class="d-flex justify-content-between mt-3">
                        <div>
                            <h4 class="mb-4 fw-bold">
                                <Label id="TxtFName">{{ auth()->user()->first_name }}</Label>
                                <Label id="TxtLName">{{ auth()->user()->last_name }}</Label>
                            </h4>
                            <p class="mb-5">
                                <Label id="TxtEmail">{{ auth()->user()->email }}</Label>
                            </p>
                        </div>
                        <div class="w-50">
                            <h5 class="mb-4 fw-bold">Bio</h5>
                            <p>
                                <label id="TxtBio">{{ auth()->user()->bio }}</label>
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
        <h1 class="navbar-brand fw-bold p-0 m-0">All Artwork</h1>
    </div>

<hr />

<div class="row row-cols-4">
    @foreach($artworks as $art)
        <div class="card col ms-5 mb-5 p-0 mt-3" style="width:21% !important;">
            <span>
                <img src="{{ asset('upload/artworks/'.$art->image_url).'' }}" class="card-img-top" style="height:250px;" />
            </span>
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <a href="">
                        <h5 class="card-title" >{{ $art->name }}</h5>
                    </a>
                    <p class="card-text text-muted">{{ $art->description }}</p>
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <p class="text-muted">Quantity : {{ $art->quantity }}</p>
                    <p class="fw-bold">$ {{ $art->price }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection
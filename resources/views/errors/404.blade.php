<!-- Author:    Lee Chun Fai -->

@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/404.css') }}" />

@endsection

@section('content')

<div class="error-container container d-flex justify-content-between m-auto h-100 position-relative">
    <img src="{{ asset('images/404 Error.svg') }}" alt="" />
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 fw-bold text-primary">Error 404</h1>
        <h2 class="text-primary">Unfortunately this page is unavailable.</h2>
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <h3 class="fw-normal text-muted">Would you like to browse some artworks instead?</h3>
            <a href="{{ route('artworks') }}" class="btn btn-primary mt-3 py-3 px-4">Browse Artworks</a>
        </div>
    </div>
</div>

@endsection
<!-- Author:    Lee Chun Fai -->

@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />

@endsection

@section('content')

<div class="container m-auto h-100 position-relative">
    <div class="receipt-container d-flex justify-content-center align-items-center my-5">
        <img src="{{ asset('images/Receipt.svg') }}" alt="" />
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="navbar-brand fw-bold p-0 m-0">Thank You for Your Order!</h1>
        <a href="{{ route('artworks') }}" class="btn btn-primary mt-5 py-3 px-4">Browse Artworks</a>
    </div>
</div>

@endsection
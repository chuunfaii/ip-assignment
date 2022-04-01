@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artists.css') }}" />

@endsection

@section('content')

<h1 class="navbar-brand fw-bold text-center my-4">View All Artists</h1>

<form action="{{ route('artists') }}" method="GET">
    <div class="mb-5 d-flex position-relative">
        <div class="input-group w-50 mx-auto">
            <input class="form-control py-2" placeholder="Enter your search query here" name="query" value="{{ request()->input('query') }}" />
            <button type="submit" class="btn btn-secondary text-muted">Search</button>
        </div>
    </div>
</form>

<div class="container">
    @if (count($artists) > 0)
        <div class="row row-cols-4 mb-5">
            @foreach ($artists as $artist)
                <div class="card col ms-5 mb-5 p-0 mt-3" style="width: 21% !important; min-height: 18rem !important;">
                    <a href='/artist/{{ $artist->id }}'>
                        @if ($artist->image_url != '')
                            <img class="card-img-top" src="{{ asset('upload/artists/' . $artist->image_url) }}">
                        @else
                            <img class="card-img-top" src="https://i.pinimg.com/564x/26/cf/3c/26cf3c80b7b5923f89fba8fe140dd660.jpg">
                        @endif
                    </a>
                    <div class="card-body">
                        <div class="card-title">
                            <a href='/artist/{{ $artist->id }}'>
                                <label class="fw-bold">{{ $artist->presentFullName() }}</label>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="mt-5 d-flex justify-content-center align-items-center flex-grow-1">
            <h4 class="display-5">No matched results.</h4>
        </div>
    @endif
</div>

@endsection
@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artworks.css') }}" />

@endsection

@section('content')

<main class="position-relative">
  <div class="container">
    <h1 class="navbar-brand fw-bold text-center my-4">View All Artworks</h1>
    <form action="{{ route('artworks') }}" method="GET">
      <div class="mb-5 d-flex position-relative">
        <!-- Search -->
        <div class="input-group w-50 mx-auto">
          <input class="form-control py-2" placeholder="Search for artworks" name="query" value="{{ request()->input('query') }}" />
          <button type="submit" class="btn btn-secondary text-muted">Search</button>
        </div>

        <!-- Sort By -->
        <div class="dropdown position-absolute end-0">
          <select id="sortDropdown" class="btn btn-secondary dropdown-toggle text-muted" data-bs-toggle="dropdown" aria-expanded="false" name="sort">
            <option value="asc" @if(request()->input('sort') === 'asc') selected @endif>
              A-Z
            </option>
            <option value="desc" @if(request()->input('sort') === 'desc') selected @endif>
              Z-A
            </option>
            <option value="low" @if(request()->input('sort') === 'low') selected @endif>
              Lowest Price
            </option>
            <option value="high" @if(request()->input('sort') === 'high') selected @endif>
              Highest Price
            </option>
          </select>
        </div>
      </div>
    </form>

    @if (count($artworks) > 0)
      <div class="row row-cols-4 mb-5">
        @foreach($artworks as $artwork)
          <div class="card col ms-5 p-0 mt-4" style="width: 21% !important;">
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
                <p class="text-muted">{{ $artwork->artist->presentFullName() }}</p>
                <p class="fw-bold">{{ $artwork->presentPrice() }}</p>
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
</main>

@endsection

@section('extra-js')

<script>
  $('#sortDropdown').on('change', function(e) {
    $(this).closest('form').submit();
  });
</script>

@endsection